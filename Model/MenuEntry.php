<?php
namespace Model;

class MenuEntry {
	private $_id;
	private $_name;
	private $_category;
	private $_price;

	public function __construct($entry) {

	}

	public static function renderEntry($title, $price, $width = 85, $spacer = '.') {
		return str_pad($title, $width, $spacer, STR_PAD_RIGHT).$price."$";
	}
}