<?php

/*
 * always use $this->set('title_for_layout', '(PAGE NAME)')
 * in every start of the controller (only for views)
 *
*/

App::uses('Controller', 'Controller');
class LoginController extends AppController {
	public $uses = array('Display', 'User');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}

	public function index() {
 		$this->set('title_for_layout', 'Bentahanan');
 		
	}

	private function getAllFoods() {
		return $this->Display->find('all', array(
			'conditions' => array('Display.category' => '1'),
			'order' => 'rand()',
			'limit' => 4
		));
	}

	private function getAllOfficeSupplies() {
		return $this->Display->find('all', array(
			'conditions' => array('Display.category' => '4'),
			'order' => 'rand()',
			'limit' => 4
		));	
	}

	private function getAllMedicines() {
		return $this->Display->find('all', array(
			'conditions' => array('Display.category' => '5'),
			'order' => 'rand()',
			'limit' => 4
		));	
	}

	public function login() {
		$this->set('title_for_layout', 'Login');

		
		if($this->request->is('post')) {
			myTools::display($this->request->data);
			$password = AuthComponent::password($this->request->data['Login']['password']);
			echo $password;
			exit;
		} 
	}

	

}
?>