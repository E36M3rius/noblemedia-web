<?php
namespace View;

/**
 * View controller.
 */
class Controller {
	public function __construct() {}

	/**
	 * Takes a set of params and includes specified file.
	 *
	 * @param  string $file
	 * @param  Array  $params
	 */
	public function render($file, Array $params) {
		// check if file exists
		$includeFile = VIEW_PATH."pc/$file";
		if (file_exists($includeFile)) {
			// create variables
			if (count($params)) {
				foreach ($params as $name => $value) {
					${$name} = $value;
				}
			}
			// include
			include($includeFile);
		}
	}
}