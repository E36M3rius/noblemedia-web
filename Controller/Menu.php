<?php
namespace Controller;
use \View\Controller as View;

class Menu extends \App\Core\Page {

	public function __construct() {
		parent::__construct();
	}

	public function GET() {
		$data = $this->_getCommonData();
		$view = new View();

		$dbAdapter = \Package_v1\Mysqli::getInstance();

		$data['menu_categories'] = array(
			1 => array(
				'title' => 'Appetizers',
			),
			2 => array(
				'title' => 'Soups',
			),
			3 => array(
				'title' => 'Salads',
			),
			4 => array(
				'title' => 'Resistance platters',
			),
			5 => array(
				'title' => 'Grill steaks',
			),
			6 => array(
				'title' => 'Seafood combined',
			),
			7 => array(
				'title' => 'Seafood',
			),
			8 => array(
				'title' => 'Kids',
			),
			9 => array(
				'title' => 'Dessert',
			),
			10 => array(
				'title' => 'Drinks',
			),
			11 => array(
				'title' => 'Les combos',
			),
			12 => array(
				'title' => 'Lunch',
			),
		);

		$menuTypes = array(
			'appetizers' => array(
				'categories' => array(1,2,3),
				'file' => 'menu_appetizers.phtml'
			),
			'lunch' => array(
				'categories' => array(12),
				'file' => 'menu_lunch.phtml'
			),
			'dinner' => array(
				'categories' => array(4,5,6,7),
				'file' => 'menu_dinner.phtml'
			),
			'kids' => array(
				'categories' => array(8),
				'file' => 'menu_kids.phtml'
			),
			'dessert' => array(
				'categories' => array(9,10),
				'file' => 'menu_dessert.phtml'
			),
			'specials' => array(
				'categories' => array(11),
				'file' => 'menu_specials.phtml'
			),
			'group' => array(
				'categories' => array(0),
				'file' => 'menu_group.phtml'
			),
		);

		// decide which menu type is loaded
		$params = $this->_request->getParams();

		if (!isset($params[1]) || !array_key_exists(strtolower($params[1]), $menuTypes)) {
			$this->_redirect404();
		}

		$menuType = $menuTypes[$params[1]];

		// fetch from database
		$sql = "SELECT * FROM menu WHERE type IN (".implode(",", $menuType['categories']).")";
		$menuData = $dbAdapter->fetchAssoc($sql);
		$groupedMenuData = array();

		// group
		if (is_array($menuData) && count($menuData)) {
			$tmpMenuData = $menuData;
			$menuData = array();
			foreach ($tmpMenuData as $key => $row) {
				$menuData[$row['type']][] = $row;
			}
		}

		$data['menu'] = $menuData;
		$data['menu_type'] = ucfirst($params[1]);

		// include views
		// header
		$view->render('header.phtml', array('page_params' => $data));
		// body
		// $view->render($menuType['file'], array('page_params' => $data));
		$view->render('menu.phtml', array('page_params' => $data));
		// footer
		$view->render('footer.phtml', array('page_params' => $data));
	}

	public function POST() {

	}
}
