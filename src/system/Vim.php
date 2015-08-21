<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 8/20/15 020
 * Time: 1:36 PM
 */


/**
 * Class Vim
 */
class Vim {

	private $url;

	/**
	 * Constructor.
	 */
	function Vim() {
		// Slice the URL requested, if empty, assign "null" at key 0.
		if(isset($_GET['url'])) {
			$urlToTrim = explode("/", $_GET['url']);
			$this->url = $urlToTrim;
		} else {
			$this->url = array("0" => "null");
		}
	}

	/**
	 * route function.
	 */
	function route() {
		$this->enter($this->url[0]);
	}


	/**
	 *
	 * @param $controller
	 */
	function enter($controller) {
		// Call a given controller, except when the segment1 is "null", in which, call Home.
		if($controller!="null") {
			$instance = new $controller();
			$instance->main();
		} else {
			$instance = new Home();
			$instance->main();
		}


	}

	function main() {

	}

}