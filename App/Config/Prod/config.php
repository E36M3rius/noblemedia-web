<?php
error_reporting(0);

$domain = 'cavernegrecque.com';
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
			'user' => 'mariusbo_root',
			'password' => 'qwe123',
			'database' => 'mariusbo_caverne',
			'charset' => 'utf8'
		),
		'slave' => array(
			'host' => 'localhost',
			'user' => 'mariusbo_root',
			'password' => 'qwe123',
			'database' => 'mariusbo_caverne',
			'charset' => 'utf8'
		),
	),
);
