<?php
namespace Package_v1;

class Request {
	private $_params;
	private $_requestUri;
	private $_server;
	private $_get;
	private $_post;
	private $_request;
	private $_cookies;
	private $_files;

	public function __construct() {
		$this->_initializeSuperGlobals();
		$this->_requestUri = $this->_server['REQUEST_URI'];
		$this->_params = explode("/", trim($this->_requestUri, "/"));
	}

	public function server($index) {
		return isset($this->_server[$index]) ? $this->_server[$index] : false;
	}

	public function get() {
		return isset($this->_get[$index]) ? $this->_get[$index] : false;
	}

	public function post($index = null) {
		return isset($this->_post[$index]) ? $this->_post[$index] : $this->_post;
	}

	public function request() {
		return isset($this->_request[$index]) ? $this->_request[$index] : false;
	}

	public function cookies() {
		return isset($this->_cookies[$index]) ? $this->_cookies[$index] : false;
	}

	public function files() {
		return isset($this->_files[$index]) ? $this->_files[$index] : false;
	}

	public function getParams() {
		return $this->_params;
	}

	public function getRequestUri() {
		return $this->_requestUri;
	}

	private function _sanitizeString($string) {
		return filter_var($string, FILTER_SANITIZE_STRING);
	}

	private function _initializeSuperGlobals() {
		foreach ($_GET as $key => $value) {
			$this->_get[$key] = $this->_sanitizeString($value);
		}
		unset($_GET);

		foreach ($_POST as $key => $value) {
			$this->_post[$key] = $this->_sanitizeString($value);
		}
		unset($_POST);

		foreach ($_REQUEST as $key => $value) {
			$this->_request[$key] = $this->_sanitizeString($value);
		}
		unset($_REQUEST);

		$this->_server = $_SERVER;
		unset($_SERVER);

		$this->_cookies = $_COOKIE;
		unset($_COOKIE);

		$this->_files = $_FILES;
		unset($_FILES);
	}
}