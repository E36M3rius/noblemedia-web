<?php
error_reporting(E_ALL);

$domain = 'noblemedia.mariusbogdan.com';
return array(
	'site_url' => 'http://'.$domain.'/',
	'static_url' => 'http://'.$domain.'/',

	'pagemap' => array(
		'contact/' => '\Controller\Contact',
		'reservations/' => '\Controller\Reservations',
		'menu/[0-9A-Za-z]+/' => '\Controller\Menu',
		'' => '\Controller\Home',
	),

	'mysql' => array(
		'master' => array(
			'host' => 'localhost',
			'user' => 'root',
			'password' => 'qwe123',
			'database' => 'caverne',
			'charset' => 'utf8'
		),
		'slave' => array(
			'host' => 'localhost',
			'user' => 'root',
			'password' => 'qwe123',
			'database' => 'caverne',
			'charset' => 'utf8'
		),
	),
);
