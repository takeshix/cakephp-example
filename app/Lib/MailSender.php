<?php

App::uses('TwigEmail', 'TwigView.Lib');

class MailSender {

	public function send() {
		$mail = $this->_mailer();
		$mail
			->to("konno@coosy.co.jp")
			->from("admin@localhost.local")
			->subject("test")
			->template("sample")
			->viewVars(array(
				"name" => "test", 
			))
			->send();
	}

	protected function _mailer() {
		return new TwigEmail("default");
	}
}
