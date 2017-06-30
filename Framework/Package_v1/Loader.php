<?php
namespace Package_v1;

class Loader {
	/**
	 * Simple autoloader that uses PSR-0 naming convention
	 * @param  string $className
	 */
	public function autoloader($className) {
		// use SPR-0
		$path = str_replace('\\', '/', $className).'.php';

		// loop through the include paths
		foreach (explode(PATH_SEPARATOR, get_include_path()) as $includePath) {
			// build file path
			$filePath = $includePath.DIRECTORY_SEPARATOR.$path;
			// check if the file exists first, run a second check for include status
			if (file_exists($filePath) && !in_array($filePath, get_included_files())) {
				// include, we are done here
				include($filePath);
				// done here
				break;
			}
		}
	}

	public static function initializeAutoloader() {
		spl_autoload_register(array(new self, 'autoloader'));
	}
}