<?php
App::uses('Controller', 'Controller');
class LoginController extends AppController {
	public $uses = array('Product', 'User');

	public function beforeFilter() {
		parent::beforeFilter();
	}

	public function index() {
 		$this->set('title_for_layout', 'Login');
	}
}
?>