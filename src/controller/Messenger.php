<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 8/20/15 020
 * Time: 2:04 PM
 */


/**
 * Class Home
 */
class Messenger extends Controller {

	/**
	 * Constructor.
	 */
	function Home() {
		parent::__construct();
	}

	function main() {

		if(strtolower($_SERVER["REQUEST_METHOD"]) == "get") {
			$data = null;
			$this->view->render("tmpl_messenger", $data);
		} else {
			$IC = new ImageProcessor();
			$file_path = $IC->uploadImage();

			$response = array();

			$protect = isset($_POST["protect"]) ? $_POST["protect"] : null;
			if( $protect == 'on' ){
				$signature = $_POST["signature"];
				$password = $_POST["pw"];
				$image_data = $IC->inject($file_path, $signature, $password);
				$im = imagecreatefromstring($image_data);
				imagealphablending($im, true);
				imagesavealpha($im, true);
				$file_path = $file_path.'mod';
				imagepng($im, $file_path);
				imagedestroy($im);
			} else {
				$signature = $_POST["signature"];
				if(empty($signature)) $signature = $_POST["user_info"];
				$image_data = $IC->inject($file_path, $signature);
				$im = imagecreatefromstring($image_data);
				imagealphablending($im, true);
				imagesavealpha($im, true);
				$file_path = $file_path.'mod';
				imagepng($im, $file_path);
				imagedestroy($im);
			}
			$response["status"] = "success";
			$response["file"] = $file_path;
			echo json_encode($response);
		}

	}

	function doGet() {

	}

	function doPost() {

	}
}