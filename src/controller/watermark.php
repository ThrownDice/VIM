<?php
/**
 * Created by PhpStorm.
 * User: TD
 * Date: 2015-08-18
 * Time: 오전 12:16
 */

$email = $_POST["user_info"];
$original = $_POST["original"];
$client_addr = $_SERVER["REMOTE_ADDR"];

$response = array();

$im_info = getimagesize($original);

if(!empty($im_info)) {

    $width = $im_info[0];
    $height = $im_info[1];
    $extension = $im_info[2];
    $mime = $im_info["mime"];

    switch($extension){
        case IMAGETYPE_PNG:
            $im = imagecreatefrompng($original);
            $black_a = imagecolorallocatealpha($im, 128,128,128, 50);
            $font = 'font/NanumGothicCoding-Regular.ttf';
            imagettftext($im, 11, 0, 3, 15, $black_a, $font, $email);
            imagettftext($im, 11, 0, 3, 30, $black_a, $font, $client_addr);

            ob_start();
            imagepng($im);
            $image_data = ob_get_contents();
            ob_end_clean();

            $response["data"] = base64_encode($image_data);
            $response["status"] = "success";
            $response["mime"] = $mime;
            imagedestroy($im);
            break;
    }

} else {
    $response["status"] = "error";
    $response["text"] = "requested file is not image";
}

ob_start();
echo json_encode($response);