<?php
namespace Package_v1;

class Config {
	public static function loadConfig($path) {
		return include($path);
	}
}