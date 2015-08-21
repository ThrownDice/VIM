<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 8/20/15 020
 * Time: 6:09 PM
 */


/**
 * Class View
 */
class View {

	function render($file_template) {
		require_once VIEWPATH."template".DS.$file_template.".php";
	}
}