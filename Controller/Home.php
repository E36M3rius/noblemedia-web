<?php
namespace Controller;
use \View\Controller as View;

class Home extends \App\Core\Page {

	public function __construct() {
		parent::__construct();
	}

	public function GET() {
		$data = $this->_getCommonData();
		$view = new View();

		// compute images for slider
		$data['slider_images'] = array();
		// for ($i=1; $i <= 36; $i++) {
			array_push($data['slider_images'], 'f1');
			// array_push($data['slider_images'], 'f'.str_pad($i, 4, 0, STR_PAD_LEFT));
		// }

		// get specials
		// fetch from database
		$hour = date('H');
		if ($hour > 15) {
			// show dinner special
			$sql = "SELECT * FROM menu WHERE type = 11";
			$data['special_type'] = 'Dinner Specials';
		} else {
			// show lunch special
			$data['special_type'] = 'Lunch Specials';
			$sql = "SELECT * FROM menu WHERE type = 12 ORDER BY RAND() LIMIT 5";
		}

		$dbAdapter = \Package_v1\Mysqli::getInstance();
		$data['specials'] = $dbAdapter->fetchAssoc($sql);

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