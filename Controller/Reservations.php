<?php
namespace Controller;
use \View\Controller as View;

class Reservations extends \App\Core\Page {

	public function __construct() {
		parent::__construct();
	}

	public function GET() {
		$data = $this->_getCommonData();

		$view = new View();
		// include views
		// header
		$view->render('header.phtml', array('page_params' => $data));
		// body
		$view->render('home.phtml', array('page_params' => $data));
		// footer
		$view->render('footer.phtml', array('page_params' => $data));
	}

	public function POST() {

	}
}