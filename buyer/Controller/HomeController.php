<?php

/*
 * always use $this->set('title_for_layout', '(PAGE NAME)')
 * in every start of the controller (only for views)
 *
*/

App::uses('Controller', 'Controller');
class HomeController extends AppController {
	public $uses = array('Display', 'User');

	public function beforeFilter() {
		parent::beforeFilter();

	}

	public function index() {

		if ($this->request->is('post')) {
			myTools::display($this->request->data);
			exit;
		}
	}

}

?>