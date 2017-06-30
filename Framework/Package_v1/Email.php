<?php
namespace Package_v1;

class Email {
	private $_to;
	private $_from;
	private $_subject;
	private $_body;

	public function __construct($to, $subject, $from, $body, Array $attachments = array()) {
		$this->_to = $to;
		$this->_subject = $subject;
		$this->_from = $from;
		$this->_body = $body;
	}

	public function send() {
		return mail($this->_to, $this->_subject, $this->_from, $this->_body);
	}
}