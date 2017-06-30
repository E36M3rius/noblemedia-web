<?php
namespace Package_v1;

class Mysqli extends \Mysqli {
	private static $_instance;
	private static $_config;
	private static $_connection;

	private $_readConnection;
	private $_writeConnection;
	// private $_connection;
	private $_result;

	private function __construct() {}
	private function __clone() {}

	public static function getInstance() {
		if (!self::$_instance instanceof self) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	private function _connection() {

	}

	public static function initialize($config) {
		self::$_config = $config;
		// prepare connection
		self::$_connection = new \Mysqli($config['host'], $config['user'], $config['password'], $config['database']);
	}

	public function query($sql) {
		return self::$_connection->query($sql);
	}

	public function escape() {

	}

	public function update() {

	}

	public function insert() {

	}

	public function delete() {

	}

	public function fetchAssoc($sql) {
		$data = array();
		$result = self::$_connection->query($sql);
		while ($row = $result->fetch_assoc()) {
			array_push($data, $row);
		}

		return $data;
	}

	public function fetchObject() {
		return self::$_connection->query($sql)->fetch_object();
	}
}