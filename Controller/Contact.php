<?php
namespace Controller;
use \View\Controller as View;

class Contact extends \App\Core\Page {
	private $_message;

	public function __construct() {
		parent::__construct();
	}

	public function GET() {
		$data = $this->_getCommonData();
		$view = new View();
		$data['message'] = $this->_message;
		// include views
		// header
		$view->render('header.phtml', array('page_params' => $data));
		// body
		$view->render('contact.phtml', array('page_params' => $data));
		// footer
		$view->render('footer.phtml', array('page_params' => $data));
	}

	public function POST() {
		// process form
		if (count($this->_request->post())) {
			$post = $this->_request->post();
			$from = isset($post['formemail']) ? $post['formemail'] : 'unknown';
			ob_start();
			include(VIEW_PATH."pc/email/contact.phtml");
			$body = ob_get_clean();
			$email = new \Package_v1\Email('mb.iordache@gmail.com,alam.md2007@gmail.com', 'Caverne Grecque Contact Form', $from, $body);
			if ($email->send()) {
				$this->_message = "Thank you for contacting us. We will process your request shortly.";
			} else {
				$this->_message = "Our email service is temporarely having issues. Please try again at a later time.";
			}
		}
		$this->GET();
	}
}