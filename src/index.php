<?php
/**
 * Serves as an entry point.
 *
 *
 * Created by PhpStorm.
 * User: user, TD
 * Date: 8/20/15 020
 * Time: 1:32 PM
 */


/**
 * Set the path.
 */
	// Directory separator. For use of different OS.
	define('DS',DIRECTORY_SEPARATOR);

	// Set the system folder path.
	define('SYSPATH', 'system'.DS);

	// Set the controller folder path.
	define('CTRPATH', 'controller'.DS);

	// Set the view folder path.
	define('VIEWPATH', 'view'.DS);

	// Set the model folder path.
	define('MODELPATH', 'model'.DS);


/**
 * Define SPL autoload register.
 */
	spl_autoload_register(function($class) {
		$paths = array(SYSPATH, CTRPATH, MODELPATH);

		// Iterate over the paths set, and include if any file is detected.
		foreach ($paths as $path) {
			$file = $path . $class . '.php';
			if (file_exists($file))
				require_once $file;
		}
	});



/**
 * Program ignitition.
 */
	$vim = new Vim();
	$vim->route();




