<?php
namespace Package_v1;

class Registry {
	// contains resources/config etc.
	private static $bucket = array();

	public static function store($name, $value) {
		self::$bucket[$name] = $value;
	}

	public static function get($name) {
		if (!isset(self::$bucket[$name])) {
			// throw new \Exception("Registry cannot find '$name'");
		}

		return self::$bucket[$name];
	}
}