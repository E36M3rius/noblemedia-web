<?php
namespace Package_v1;

class Security {
	public static function sanitizeSuperGlobals() {
		// $_REQUEST
		if (isset($_REQUEST)) {
			foreach ($_REQUEST as $param => $value) {
				$_REQUEST[$param] = filter_var($value, FILTER_SANITIZE_STRING);
			}
		}

		// $_COOKIE maybe
		// todo

		// $_GET
		if (isset($_GET)) {
			foreach ($_GET as $param => $value) {
				$_GET[$param] = filter_var($value, FILTER_SANITIZE_STRING);
			}
		}
		// $_POST
		if (isset($_POST)) {
			foreach ($_POST as $param => $value) {
				$_POST[$param] = filter_var($value, FILTER_SANITIZE_STRING);
			}
		}
	}
}