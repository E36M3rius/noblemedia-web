<?php
namespace Package_v1;

class Router {
	/**
	 * stick
	 *
	 * the main static function of the glue class.
	 *
	 * @param   array    	$urls  	    The regex-based url to class mapping
	 * @throws  Exception               Thrown if corresponding class is not found
	 * @throws  Exception               Thrown if no match is found
	 * @throws  BadMethodCallException  Thrown if a corresponding GET,POST is not found
	 *
	 */
	public static function stick (Array $urls) {
		$method = strtoupper($_SERVER['REQUEST_METHOD']);
		// $path = ltrim($_SERVER['REQUEST_URI'], '/');
		$path = $_SERVER['REQUEST_URI'];

		$found = false;

		foreach ($urls as $regex => $class) {
			$regex = str_replace('/', '\/', $regex);
			// $regex = '^' . $regex . '\/?$';
			if (preg_match("/$regex/i", $path, $matches)) {
				$found = true;
				if (class_exists($class)) {
					$obj = new $class;
					if (method_exists($obj, $method)) {
						$obj->$method($matches);
					} else {
						// throw new BadMethodCallException("Method, $method, not supported.");
					}
				} else {
					// throw new Exception("Class, $class, not found.");
				}
				break;
			}
		}
		if (!$found) {
			// throw new Exception("URL, $path, not found.");
		}
	}
}
