<?php
/**
 * Created by PhpStorm.
 * User: TD
 * Date: 2015-08-21
 * Time: 오후 4:27
 */

class ImageProcessor {

    public $HEADER_SIGNATURE = 1560490131;

    public $HEADER_SIGNATURE_WITH_ENCRYPT = 1433494437;

    public $MAX_CONTENTS_LEN = 74;

    public $DEFAULT_WATER_MARK_FONT_PATH = 'font/COOPBL.TTF';

    public $DEFAULT_WATER_MARK_FONT_SIZE = 15;

    //이미지에 정보를 삽입한다
    function inject($file_path, $contents, $key = null) {

        $im_info = getimagesize($file_path);

        if($im_info) {

            $width = $im_info[0];
            $height = $im_info[1];
            $extension = $im_info[2];

            echo 'width : ', $width, '<br>';
            echo 'height : ', $height, '<br>';

            /*if($width < 200 || $height < 200) {
                //todo : too small size of image
                return null;
            }*/

            $im = imagecreatefrompng($file_path);
            imagealphablending($im, true);
            imagesavealpha($im, true);

            //키값이 파라미터로 넘어오면 콘텐츠를 키값으로 암호화 한다
            if($key) {
                $contents = $this->cipher($contents, $key);
                $contents = md5($key).$contents;
            }
            $contents_len = strlen($contents);

            if($contents_len <= $this->MAX_CONTENTS_LEN) {

                //시그니쳐를 바이너리 정보로 변환 (패스워드가 있는 경우 암호화 시그니쳐를 사용)
                if($key) $binary_signature = str_pad(decbin($this->HEADER_SIGNATURE_WITH_ENCRYPT), 33, '0', STR_PAD_LEFT);
                else $binary_signature = str_pad(decbin($this->HEADER_SIGNATURE), 33, '0', STR_PAD_LEFT);

                //콘텐츠 길이를 바이너리 정보로 변환
                $binary_text_len = str_pad(decbin($contents_len), 6, '0', STR_PAD_LEFT);

                //콘텐츠를 바이너리 정보로 변환
                $binary_contents = '';
                for($i=0;$i<$contents_len; $i++) {
                    $binary_contents = $binary_contents.str_pad(decbin(ord($contents[$i])), 9, '0', STR_PAD_LEFT);
                }

                $total_binary_info = $binary_signature.$binary_text_len.$binary_contents;

                //3개씩 끊어서 inject하고
                //남은 바이너리 정보가 3미만이 되면 str_pad로 3을 맞춰준 후 inject

                $i = 0;
                do {
                    $len = strlen($total_binary_info);

                    if($len < 3) {
                        $total_binary_info = str_pad($total_binary_info, 3, '0', STR_PAD_LEFT);
                    }
                    $tri_bit = substr($total_binary_info, 0, 3);
                    $coordinate = $this->translate2Coordinate($i, $width, $height);
                    $this->injectInfoPixel($im, $coordinate["x"], $coordinate["y"], $tri_bit);

                    //inject 한 bit 들은 truncate
                    $total_binary_info = substr($total_binary_info, 3);

                    $i++;
                } while($len > 0);

                ob_start();
                imagepng($im);
                $image_data = ob_get_contents();
                ob_end_clean();

                imagedestroy($im);

                return $image_data;
            } else {
                //todo : 에러 표시, 콘텐츠 길이 제한
            }

            //if( ( $width * $height ) < ($contents_len + )

        } else {
            //todo : 에러 출력, 이미지 파일이 아님
        }
        //setHeader 함수로 헤더 정보를 삽입한다.

        //setContents 함수로 콘텐츠 정보를 삽입한다.
    }

    //이미지에서 정보를 추출한다
    function extract($file_path, $key = null) {

        $im_info = getimagesize($file_path);

        if($im_info) {

            $width = $im_info[0];
            $height = $im_info[1];
            $extension = $im_info[2];
            $im = imagecreatefrompng($file_path);

            imagealphablending($im, true);
            imagesavealpha($im, true);

            //헤더 정보 추출
            $header = '';
            for($i=0; $i<13; $i++) {
                $coordinate = $this->translate2Coordinate($i, $width, $height);
                $header = $header.$this->extractInfoByPixel($im, $coordinate['x'], $coordinate['y']);
            }

            $bi_header_signature = substr($header, 0, 33);
            $bi_content_length = substr($header, 33);

            $header_signature = bindec($bi_header_signature);
            $content_length = bindec($bi_content_length);

            //시그니쳐 확인
            if( ($header_signature == $this->HEADER_SIGNATURE) || ($header_signature == $this->HEADER_SIGNATURE_WITH_ENCRYPT) ) {
                //콘텐츠 정보 추출
                $limit = $content_length * 3 + 13;
                $contents = '';
                $buffer = '';
                for($i=13; $i<$limit; $i++) {
                    $coordinate = $this->translate2Coordinate($i, $width, $height);
                    $buffer = $buffer.$this->extractInfoByPixel($im, $coordinate["x"], $coordinate["y"]);

                    if(strlen($buffer) >= 9 ) {
                        //echo bindec($buffer), '<br>';
                        $contents = $contents.chr(bindec($buffer));
                        $buffer = '';
                    }
                }

                //암호화 시그니쳐인 경우에는 키값이 일치하는지 확인한다
                if( $header_signature == $this->HEADER_SIGNATURE_WITH_ENCRYPT ) {
                    $hash = substr($contents, 0, 32);
                    if( $hash == md5($key) ) {
                        $contents = $this->cipher(substr($contents, 32), $key);
                    } else {
                        //todo : 키값이 일치 하지 않음
                        echo '키값이 일치 하지 않음';
                        return '';
                    }
                }

            } else {
                //todo : 숨겨진 메시지가 없음
                return '';
            }
            imagedestroy($im);

            return $contents;
        } else {
            //todo : 에러 표시, 이미지 파일이 아님
        }

    }

    //이미지에 워터마크를 찍는다
    function watermark($file_path, $text) {

        $im_info = getimagesize($file_path);

        if($im_info) {

            $width = $im_info[0];
            $height = $im_info[1];
            $extension = $im_info[2];
            $im = imagecreatefrompng($file_path);

            imagealphablending($im, true);
            imagesavealpha($im, true);

            //헤더 정보 추출
            $header = '';
            for($i=0; $i<13; $i++) {
                $coordinate = $this->translate2Coordinate($i, $width, $height);
                $header = $header.$this->extractInfoByPixel($im, $coordinate['x'], $coordinate['y']);
            }

            $bi_header_signature = substr($header, 0, 33);
            $bi_content_length = substr($header, 33);

            $header_signature = bindec($bi_header_signature);
            $content_length = bindec($bi_content_length);

            //시그니쳐 확인
            if( ($header_signature == $this->HEADER_SIGNATURE) || ($header_signature == $this->HEADER_SIGNATURE_WITH_ENCRYPT) ) {
                //숨겨진 메시지가 있는 이미지

                //보호 영역 설정을 위해 좌표 계산
                $coordinate = $this->translate2Coordinate(13 + $content_length * 3, $width, $height);

                $upper_left_x = 0;
                $upper_left_y = 0;

                $lower_right_x = $width;
                $lower_right_y = $coordinate["y"];

                $water_mark_font_size = $this->getProperFontSize($this->DEFAULT_WATER_MARK_FONT_SIZE, $text, $this->DEFAULT_WATER_MARK_FONT_PATH, $width);

                $bounding = imagettfbbox($water_mark_font_size, 0, $this->DEFAULT_WATER_MARK_FONT_PATH, $text);

                $water_mark_x = rand(0, $width - $bounding[4]);
                $water_mark_y = rand($lower_right_y + $water_mark_font_size, $height);

                $water_mark_color = $transparent = imagecolorallocatealpha($im, 150, 150, 150, 70);

                imagettftext($im, $water_mark_font_size, 0, $water_mark_x, $water_mark_y, $water_mark_color, $this->DEFAULT_WATER_MARK_FONT_PATH, $text);

                ob_start();
                imagepng($im);
                $image_data = ob_get_contents();
                ob_end_clean();
                return $image_data;
            } else {
                //숨겨진 메시지가 없는 이미지
                $upper_left_x = 0;
                $upper_left_y = 0;

                $lower_right_x = $width;
                $lower_right_y = $height;

                $water_mark_font_size = $this->getProperFontSize($this->DEFAULT_WATER_MARK_FONT_SIZE, $text, $this->DEFAULT_WATER_MARK_FONT_PATH, $width);

                $bounding = imagettfbbox($water_mark_font_size, 0, $this->DEFAULT_WATER_MARK_FONT_PATH, $text);

                $water_mark_x = rand(0, $width - $bounding[4]);
                $water_mark_y = rand($upper_left_y + $water_mark_font_size, $lower_right_y);

                $water_mark_color = $transparent = imagecolorallocatealpha($im, 150, 150, 150, 70);

                imagettftext($im, $water_mark_font_size, 0, $water_mark_x, $water_mark_y, $water_mark_color, $this->DEFAULT_WATER_MARK_FONT_PATH, $text);

                ob_start();
                imagepng($im);
                $image_data = ob_get_contents();
                ob_end_clean();
                return $image_data;
            }
        } else {
            //todo : 에러표시, 이미지가 아님
            return '';
        }
    }

    function watermarkByStringImage($image_data, $text) {

        $im = imagecreatefromstring($image_data);

        if($im) {
            $width = imagesx($im);
            $height = imagesy($im);

            imagealphablending($im, true);
            imagesavealpha($im, true);

            //헤더 정보 추출
            $header = '';
            for($i=0; $i<13; $i++) {
                $coordinate = $this->translate2Coordinate($i, $width, $height);
                $header = $header.$this->extractInfoByPixel($im, $coordinate['x'], $coordinate['y']);
            }

            $bi_header_signature = substr($header, 0, 33);
            $bi_content_length = substr($header, 33);

            $header_signature = bindec($bi_header_signature);
            $content_length = bindec($bi_content_length);

            //시그니쳐 확인
            if( ($header_signature == $this->HEADER_SIGNATURE) || ($header_signature == $this->HEADER_SIGNATURE_WITH_ENCRYPT) ) {
                //숨겨진 메시지가 있는 이미지

                //보호 영역 설정을 위해 좌표 계산
                $coordinate = $this->translate2Coordinate(13 + $content_length * 3, $width, $height);

                $upper_left_x = 0;
                $upper_left_y = 0;

                $lower_right_x = $width;
                $lower_right_y = $coordinate["y"];

                $water_mark_font_size = $this->getProperFontSize($this->DEFAULT_WATER_MARK_FONT_SIZE, $text, $this->DEFAULT_WATER_MARK_FONT_PATH, $width);

                $bounding = imagettfbbox($water_mark_font_size, 0, $this->DEFAULT_WATER_MARK_FONT_PATH, $text);

                $water_mark_x = rand(0, $width - $bounding[4]);
                $water_mark_y = rand($lower_right_y + $water_mark_font_size, $height);

                $water_mark_color = $transparent = imagecolorallocatealpha($im, 150, 150, 150, 70);

                imagettftext($im, $water_mark_font_size, 0, $water_mark_x, $water_mark_y, $water_mark_color, $this->DEFAULT_WATER_MARK_FONT_PATH, $text);

                ob_start();
                imagepng($im);
                $image_data = ob_get_contents();
                ob_end_clean();
                return $image_data;
            } else {
                //숨겨진 메시지가 없는 이미지
                $upper_left_x = 0;
                $upper_left_y = 0;

                $lower_right_x = $width;
                $lower_right_y = $height;

                $water_mark_font_size = $this->getProperFontSize($this->DEFAULT_WATER_MARK_FONT_SIZE, $text, $this->DEFAULT_WATER_MARK_FONT_PATH, $width);

                $bounding = imagettfbbox($water_mark_font_size, 0, $this->DEFAULT_WATER_MARK_FONT_PATH, $text);

                $water_mark_x = rand(0, $width - $bounding[4]);
                $water_mark_y = rand($upper_left_y + $water_mark_font_size, $lower_right_y);

                $water_mark_color = $transparent = imagecolorallocatealpha($im, 150, 150, 150, 70);

                imagettftext($im, $water_mark_font_size, 0, $water_mark_x, $water_mark_y, $water_mark_color, $this->DEFAULT_WATER_MARK_FONT_PATH, $text);

                ob_start();
                imagepng($im);
                $image_data = ob_get_contents();
                ob_end_clean();
                return $image_data;
            }
        }

    }

    //이미지를 업로드한다
    function uploadImage() {

        $target_dir = "upload/";
        $target_file = $target_dir . date('yyyymmddHHiissuu'). basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $response = array();
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["file"]["tmp_name"]);
            if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                //echo "File is not an image.";
                $response["message"] = "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            //echo "Sorry, file already exists.";
            $uploadOk = 0;
            $response["message"] = "Sorry, file already exists.";
        }
        // Check file size
        if ($_FILES["file"]["size"] > 500000) {
            //echo "Sorry, your file is too large.";
            $uploadOk = 0;
            $response["message"] = "Sorry, your file is too large.";
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            $response["message"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
            $response["status"] = "error";
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                //echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
                $response["status"] = "success";
                $response["filename"] = $target_file;
            } else {
                //echo "Sorry, there was an error uploading your file.";
                $response["status"] = "error";
                $response["message"] = "Sorry, there was an error uploading your file.";
            }
        }

        //처리 결과를 클라언트에게 돌려줌
        return $target_file;
    }

    //텍스트를 이미지화 한다 (카톡 스타일)
    function text2Image($text, $signature) {
        $len = strlen($text);
        $font = 'font/NanumGothicCoding-Regular.ttf';

        //텍스트 짜르기, 한글, 영문 인코딩 고려하여 자른다
        $text_box = array();
        $max_pointer = 0;
        $bounding_limit = 230;
        do {
            $len = strlen($text);
            if($max_pointer >= $len) break;

            $temp = substr($text, 0, $max_pointer + 1);
            $bounding = imagettfbbox(10, 0, $font, $temp);

            //bound값이 넘는지 확인
            //4번 인덱스 값은 upper right corner, X position
            if($bounding[4] > $bounding_limit) {
                $text_box[] = $temp;
                $text = substr($text, $max_pointer + 1);
                $max_pointer = 0;
            } else {
                $max_pointer++;
                if($max_pointer >= $len) break;
                if(ord($text[$max_pointer]) > 127) {
                    $max_pointer += 2;
                }
            }

        } while($len > 0);
        $text_box[] = $text;
        //텍스트 짜르기 -끝-

        //이미지 준비
        $image_width = 420;
        $image_height = 14 * ( count( $text_box )  + 1 );
        $image_padding = 10;

        //흰색 타입과 노란색 타입의 두가지 형태의 이미지 준비
        $im_white = imagecreate($image_width + $image_padding, $image_height + $image_padding );
        imagealphablending($im_white, true);
        imagesavealpha($im_white, true);

        $im_yellow = imagecreate($image_width + $image_padding, $image_height + $image_padding);
        imagealphablending($im_yellow, true);
        imagesavealpha($im_yellow, true);

        //색깔 준비
        imagecolorallocatealpha($im_white, 155, 186, 216, 0);
        $text_color_4_white = imagecolorallocate($im_white, 0, 0, 0);
        $box_color_4_white = imagecolorallocate($im_white, 255, 255, 255);

        imagecolorallocatealpha($im_yellow, 155, 186, 216, 0);
        $text_color_4_yellow = imagecolorallocate($im_yellow, 0, 0, 0);
        $box_color_4_yellow = imagecolorallocate($im_yellow, 255, 236, 66);
        //이미지 준비 -끝-

        //텍스트 박스 출력
        $text_box_width = 260;
        $text_box_height = 13 * ( count($text_box) + 1);
        $box_margin = 4;

        $this->ImageRectangleWithRoundedCorners($im_white, $box_margin + 0, $box_margin + 0, $text_box_width, $text_box_height, 5, $box_color_4_white);
        $this->ImageRectangleWithRoundedCorners($im_yellow, $image_width - ($box_margin + 0) - $text_box_width, $box_margin + 0, $image_width - ($box_margin + 0), $text_box_height, 5, $box_color_4_yellow);
        //텍스트 박스 출력 -끝-

        //워터마크 출력
        $watermark_font = 'font/COOPBL.ttf';
        $signature_font_size = rand(10, 18);
        $signature_bound = imagettfbbox($signature_font_size, 0, $font, $signature);
        $signature_padding = 10;
        $signature_width = $signature_bound[4] + $signature_padding;
        $signature_x = $image_width - $signature_width;
        $signature_y = rand($signature_font_size, $image_height - $signature_font_size);
        $rand_padding = rand(10, 50);

        // Determine Color by randomization.
        $color_val = rand(150,170);

        //white-type signature
        $watermark_color = imagecolorallocatealpha($im_white, $color_val, $color_val, $color_val, 15);
        imagettftext($im_white, $signature_font_size, 0, $image_width - $signature_width - $rand_padding, $signature_y, $watermark_color, $watermark_font, $signature);
        //yellow-type signature
        $watermark_color = imagecolorallocatealpha($im_yellow, $color_val, $color_val, $color_val           , 15);
        imagettftext($im_yellow, $signature_font_size, 0, $rand_padding + 0, $signature_y, $watermark_color, $watermark_font, $signature);
        //워터마크 출력 -끝-

        //텍스트 출력
        $line_num = 1;
        $text_margin = 4;
        foreach($text_box as $line) {
            imagettftext($im_white, 10, 0, $text_margin + 1, $text_margin + 14 * $line_num, $text_color_4_white, $font, $line);
            imagettftext($im_yellow, 10, 0, $image_width - ($box_margin + 0) - $text_box_width + $text_margin + 1, $text_margin + 14 * $line_num++, $text_color_4_yellow, $font, $line);
        }
        //텍스트 출력 -끝-

        //이미지 변환
        ob_start();
        imagepng($im_white);
        $image_data_white = ob_get_contents();
        ob_end_clean();

        ob_start();
        imagepng($im_yellow);
        $image_data_yellow = ob_get_contents();
        ob_end_clean();
        //이미지 변환 -끝-

        //자원 정리
        imagedestroy($im_white);
        imagedestroy($im_yellow);
        //자원 정리 -끝-

        //리턴
        $result = array();
        $result["white"] = $image_data_white;
        $result["yellow"] = $image_data_yellow;

        return $result;
    }

    //번호를 받아서 해당 번호에 대응되는 픽셀 좌표를 리턴한다
    function translate2Coordinate($i, $width, $height) {
        $coordinate = array();
        $coordinate["x"] = $i % ($width);
        $coordinate["y"] = (int)$i / ($width);

        if($coordinate["y"] > $height) {
            //todo : 에러 표시, 좌표계 이탈
        }
        return $coordinate;
    }

    //이미지와 픽셀 좌표를 받아서 해당 좌표에 3bit 데이터를 주입한다
    function injectInfoPixel(&$im, $x, $y, $tri_bit) {
        $index = imagecolorat($im, $x, $y);
        $color = imagecolorsforindex($im, $index);

        $red = substr(str_pad(decbin($color['red']), 8, '0', STR_PAD_LEFT), 0, 7).$tri_bit[0];
        $green = substr(str_pad(decbin($color['green']), 8, '0', STR_PAD_LEFT), 0, 7).$tri_bit[1];
        $blue = substr(str_pad(decbin($color['blue']), 8, '0', STR_PAD_LEFT), 0, 7).$tri_bit[2];

        $new_color = imagecolorallocate($im, bindec($red), bindec($green), bindec($blue));
        imagesetpixel($im, $x, $y, $new_color);
    }

    //이미지와 픽셀 좌표를 받아서 해당 픽셀에서 3bit 데이터를 추출한다
    function extractInfoByPixel(&$im, $x, $y) {

        $index = imagecolorat($im, $x, $y);
        $color = imagecolorsforindex($im, $index);

        $red = str_pad(decbin($color['red']), 8, '0', STR_PAD_LEFT);
        $green = str_pad(decbin($color['green']), 8, '0', STR_PAD_LEFT);
        $blue = str_pad(decbin($color['blue']), 8, '0', STR_PAD_LEFT);

        return $red[7].$green[7].$blue[7];
    }

    //텍스트와 키 값을 받아 XOR 암호화, 복호화를 진행한다
    function cipher($text, $key) {
        $text_len = strlen($text);
        $key = str_pad($key, $text_len, $key, STR_PAD_RIGHT);
        return $text ^ $key;
    }

    //최대 너비에 들어 갈 수 있는 최대의 폰트 사이즈를 찾는다
    function getProperFontSize($max_font_size = 15, $text, $font, $max_width) {
        $proper_font_size = $max_font_size;
        while($proper_font_size > 1) {
            $bounding = imagettfbbox($proper_font_size, 0, $font, $text);
            if($max_width > $bounding[4]) break;
            $proper_font_size--;
        }
        return $proper_font_size;
    }

    //라운드 형태의 사각 박스를 그린다
    function ImageRectangleWithRoundedCorners(&$im, $x1, $y1, $x2, $y2, $radius, $color)
    {
        imagefilledrectangle($im, $x1+$radius, $y1, $x2-$radius, $y2, $color);
        imagefilledrectangle($im, $x1, $y1+$radius, $x2, $y2-$radius, $color);
        imagefilledellipse($im, $x1+$radius, $y1+$radius, $radius*2, $radius*2, $color);
        imagefilledellipse($im, $x2-$radius, $y1+$radius, $radius*2, $radius*2, $color);
        imagefilledellipse($im, $x1+$radius, $y2-$radius, $radius*2, $radius*2, $color);
        imagefilledellipse($im, $x2-$radius, $y2-$radius, $radius*2, $radius*2, $color);
    }

}

//todo : Test the IC function

//$IC = new ImageProcessor();

/** Inject Test */
//$image_data = $IC->inject('upload/large.png', 'throwndice@github.com', '7891231q2w3e4r');
//$image_data = $IC->watermarkByStringImage($image_data, 'Watermark Testing!!');
//echo '<img src="data:image/png;base64,', base64_encode($image_data), '">';

//$image_data = $IC->inject('upload/large.png', 'throwndice@github.com');
//$image_data = $IC->watermarkByStringImage($image_data, 'Watermark Testing!!');
//echo '<img src="data:image/png;base64,', base64_encode($image_data), '">';

//$image_data = $IC->inject('upload/large.png', 'throwndice@github.com', '7891231q2w3e4r');
//echo '<img src="data:image/png;base64,', base64_encode($image_data), '">';
/** Inject Test -End- */

/** Extract Test */
//$extracted_data = $IC->extract('upload/index.png');
//echo $extracted_data;

//$extracted_data = $IC->extract('upload/index.png');
//echo $extracted_data;
/** Extract Test -End- */

/** Watermark Test */
//$image_data = $IC->watermark('upload/large.png', 'kiwlgus1@korea.ac.kr');
//echo '<img src="data:image/png;base64,', base64_encode($image_data), '">';

/** Watermark Test -End- */

/** text2img Test */

/*echo '<div style="width:430px">';

$image_data = $IC->text2Image("일단 initial push했어~~", "kiwlgus1@korea.ac.kr");
echo '<img src="data:image/png;base64,', base64_encode($image_data["white"]), '">';

$image_data = $IC->text2Image("형님 어디쯤이세요? 저 디지털미디어시티 역인데", "kiwlgus1@korea.ac.kr");
echo '<img src="data:image/png;base64,', base64_encode($image_data["yellow"]), '">';

$image_data = $IC->text2Image("망함", "kiwlgus1@korea.ac.kr");
echo '<img src="data:image/png;base64,', base64_encode($image_data["white"]), '">';

$image_data = $IC->text2Image("좀더 가야함", "kiwlgus1@korea.ac.kr");
echo '<img src="data:image/png;base64,', base64_encode($image_data["white"]), '">';

$image_data = $IC->text2Image("전 지금 길잃음 ㅋㅋ, 형님 지도 사진 있으면 좀 보내주실레요?", "kiwlgus1@korea.ac.kr");
echo '<img src="data:image/png;base64,', base64_encode($image_data["yellow"]), '">';

echo '</div>';*/

/** text2img Test -End- */

?>