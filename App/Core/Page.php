<?php
namespace App\Core;

abstract class Page {
	protected $_config;
	protected $_request;

	public function __construct() {
		$this->_config = \Package_v1\Registry::get('config');
		$this->_request = new \Package_v1\Request();
		\Package_v1\Registry::store('request', $this->_request);
	}

	abstract public function GET();
	abstract public function POST();

	protected function _getCommonData() {
		$data = array(
			'site_url' => $this->_config['site_url'],
			'static_url' => $this->_config['static_url'],
		);

		return $data;
	}

	protected function _redirect404() {
		$url = $this->_config['site_url'].'404/';
		header("HTTP/1.0 404 Not Found");
		header("Location: $url");
		exit;
	}
}