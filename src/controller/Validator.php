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
class Validator extends Controller {

	/**
	 * Constructor.
	 */
	function Home() {
		parent::__construct();
	}

	function main() {
		if(strtolower($_SERVER["REQUEST_METHOD"]) == "get") {
			$action = isset($_GET["action"]) ? $_GET["action"] : "default";
			if($action == 'extractwithkey') {

			} else {
				$data = null;
				$this->view->render("tmpl_validator", $data);
			}
		} else {
			$IC = new ImageProcessor();
			if(isset($_POST["key"]) && isset($_POST["file"])) {
				$response = array();
				$result = $IC->extract($_POST["file"], $_POST["key"]);
				if($result) {
					$response["status"] = "success";
					$response["text"] = $result;
					echo json_encode($response);
				} else {
					$response["status"] = "fail";
					echo json_encode($response);
				}
			} else {
				$file_path = $IC->uploadImage();
				$response = array();
				$response["status"] = "success";
				$response["file"] = $file_path;
				if($IC->isEncrypted($file_path)) {
					$response["cipher"] = "true";
				} else {
					$response["text"] = $IC->extract($file_path);
				}
				echo json_encode($response);
			}
		}
	}

	function doGet() {

	}

	function doPost() {

	}
}