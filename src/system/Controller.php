<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 8/20/15 020
 * Time: 6:07 PM
 */


/**
 * Class Controller
 * Parent class of all controller classes.
 */
class Controller {
	public $view;

	function Controller() {
		$this->view = new View();
	}
	function doGet() {}

	function doPost() {}
}