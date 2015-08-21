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
		$data = null;
		$this->view->render("tmpl_messenger", $data);
	}

	function doGet() {

	}

	function doPost() {

	}
}