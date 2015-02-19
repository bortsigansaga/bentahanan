<?php

/*
 * always use $this->set('title_for_layout', '(PAGE NAME)')
 * in every start of the controller (only for views)
 *
*/

App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class RegisterController extends AppController {
	public $uses = array('Display', 'User');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'testGetEmail');
	}

	private function guestOnly() {
		if ($this->Auth->user('id')) {
			return $this->redirect('/');
		}
	}

	public function index() {
		

		$this->set('letters', $this->alphabets());

		$this->set('genders', $this->User->genders());

		$this->guestOnly();


		if ($this->request->is('post')) {
			$this->User->set($this->request->data['Register']);

			$session = $this->Session->write('register', $this->request->data['Register']);
			
			var_dump($this->User->validates());
			var_dump($this->request->data);
			exit;
			if ($this->User->validates()) {
				$hash = AuthComponent::password($this->request->data['Register']['password'].uniqid().date("His", time()));
					
				$data = array(
						'fname' => $this->request->data['Register']['fname'],
						'lname' => $this->request->data['Register']['lname'],
						'midInt' => $this->request->data['Register']['midInt'],
						'homeAddr' => $this->request->data['Register']['homeAddr'],
						'contactNo' => $this->request->data['Register']['contactNo'],
						'hash' => $hash,
						'emailAddr' => $this->request->data['Register']['emailAddr'],
						'password' => $this->request->data['Register']['password']
					);

					$saveData = $this->saveUserData($data);

					if (!$saveData) {
						$this->Session->setFlash("Something went wrong in saving the datas..", 'default', array('class' => 'alert alert-danger'), 'message');
					} else {
						$this->Session->destroy('register');
					}
				
				return $this->redirect('/register');
			} else {

				$errors = myTools::validation($this->User->validationErrors);
				$this->Session->setFlash(implode("<br/>", $errors), 'default', array('class' => 'alert alert-danger'), 'message');
				return $this->redirect('/register');
			}
		}
	}

	public function testGetEmail($code) {

		if (empty($this->Auth->User('id'))) {
			if (!empty($code)) {

			$user = $this->User->find('first', array(
				'conditions' => array(
						'User.hash' => $code
					)
				));
			} else {
				echo "no code";
			}
		}

		exit;

	}

	private function alphabets() {
		$letters = range('A', 'Z');
		$array = array();
		foreach ($letters as $letter) {
			$array[$letter] = $letter;
		}

		return $array;
	}

	public function sendMail($hash, $reciever) {

		$email = new CakeEmail();
		$email->config('default');
		$email->from('bentahanan@info.com');
		$email->to($reciever);
		$email->template('confirmation');
		$email->viewVars(array('hash' => $hash));
		$email->subject('Bentahanan.com Official Confirmation');
		
		if (!$email->send()) {
			return false;
		} 

		return true;
	}

	public function saveUserData($data) {
		$userData = array(
				'status' => '0',
				'fname' => $data['fname'],
				'lname' => $data['lname'],
				'midint' => $data['midInt'],
				'email' => $data['email'],
				'address' => $data['homeAddr'],
				'contact_no' => $data['contactNo'],
				'password' => AuthComponent::password($data['password']),
				'hash' => $data['hash'],
				'device' => $device,
				'created' => date('Y-m-d H:i:s'),
				'created_ip' => $_SERVER['REMOTE_ADDR']
			);

		$this->User->set($data);

		if (!$this->User->save()) {
			return false;
		}

		return true;
	}

	private function isEmailUnique($email) {

	}
}

?>