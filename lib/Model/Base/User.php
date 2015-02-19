<?php
App::uses('AppModel', 'Model');
class User extends AppModel {
	var $userTable = 'users';

	public $validate = array(
			'fname' => array (
					'notEmpty' => array(
							'rule' => 'notEmpty',
							'message' => 'First name must not be emtpy..'
						)
				),
			'lname' => array (
					'notEmpty' => array(
							'rule' => 'notEmpty',
							'message' => 'Last name must not be emtpy..'
						)
				),
			'midInt' => array (
					'notEmpty' => array(
							'rule' => 'notEmpty',
							'message' => 'Select a middle initial..'
						)
				),
			'homeAddr' => array (
					'notEmpty' => array(
							'rule' => 'notEmpty',
							'message' => 'Home Address must not be empty..'
						)
				),
			'contactNo' => array(
					'notEmpty' => array(
							'rule' => 'notEmpty',
							'message' => 'Please provide a contact number..'
						)
				),
			'email' => array(
					'notEmpty' => array(
							'rule' => 'notEmpty',
							'message' => 'Email address must not be empty..'
						),
					'isUnique' => array(
							'rule' => 'isUnique',
							'message' => 'Email address provided already used..'
						),
					'code' => array(
						'rule' => '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i',
						'message' => 'Provide a valid email address..'
					)
				),
			'password' => array(
					'notEmpty' => array(
							'rule' => 'notEmpty',
							'message' => 'Must provide a password 8 - 20 alpabets and numbers in combinations..'
						),
						'between' => array(
							'rule' => array('between', 8, 20),
							'message' => 'Password must be between 8 - 20 characters long..' 
						)
				),
			'confirmPassword' => array(
					'between' => array(
						'rule' => array('between', 8, 20),
						'message' => 'Confirm password must be between 8 - 20 characters long..' //Confirm Password must be between 8 to 20 characters.
					),
					'compare' => array(
						'rule' => array('equaltofield', 'password'),
						'message' => 'Confirm password does not match..'
					)
				)
		);

	public function genders() {

		return array(1 => 'Male', 2 => 'Female');
	}

	public function _isEmailUnique($data) {
		$count = $this->find('count', array('conditions' => array('User.email' => $data['emailAddr'], 'User.status' => 1)));
		return ($count > 0) ? 0 : 1;
	}

	public function equaltofield($check, $otherfield) {
		$field = '';
		foreach ($check as $key => $value) {
			$field = $key;
			break;
		}
		return $this->data[$this->name][$otherfield] === $this->data[$this->name][$field];
	}

	public function preRegister($data) {
		App::uses('myTools', 'Lib');
		App::uses('MobileDetect', 'Vendor');
		

		$hash = AuthComponent::password($this->getLastInsertId().uniqid(rand()));
		$device = myTools::getDevice();
		
		$validator = $this->validator();
		unset($validator['password']);

		if($this->validates()) {
			$this->set($userData);

			$saveData = $this->save();
			if(!$saveData) {
				return false;
			} else {
				return true;
			}
		} else {
			return false;
		}
	}
}
?>
<?php
/*App::uses('AppModel', 'Model');
class User extends AppModel {
	var $useTable = 'users';
	public $hasOne = array('UsersCourse', 'UsersPoint', 'UsersClass', 'UsersPointHistory', 'LessonLog', 'PhoneSmsAuth');
	public $hasMany = array('LessonSchedule');

	function afterFind($results, $primary = false) {
		parent::afterFind($results, $primary);
		foreach ($results as $key => $val) {
			if (isset($val['UsersPoint'])) {
				$results[$key]['User']['point'] = ($results[$key]['UsersPoint']['point']) ?  $results[$key]['UsersPoint']['point'] : 0 ;
			}
            if (isset($val['User']['created'])) {
                $results[$key]['User']['member_kbn'] = $this->_set_memberkbn($val['User']['created']);
            }
		}
		return $results;
	}
    private function _set_memberkbn($regist_date) {
        // 事前登録会員は1 それ以外は0
        return ($regist_date && (strtotime($regist_date) <= strtotime("2015-03-01 00:00:00"))) ? 1 : 0;
    }


	public $validate = array(
		'nickname' => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => 'お名前は必須項目です。', //Nickname cannot be left blank
			),
			'maxLength' => array(
				'rule'    => array('maxLength', 50),
				'message' => 'お名前は50文字以内で入力して下さい。'//Nickname must be no larger than 50 characters long.
			),
			'code' => array(
				'rule' => '/^[a-zA-Z0-9 ]+$/i',
				'message' => 'お名前は半角英数字で入力して下さい。'
			)
		),
		'email' => array(
			'notEmpty' => array(
				'rule' => 'email',
				'required' => 'true',
				'allowEmpty' => false,
				'message' => '有効なメールアドレスを入力してください。'//Please supply a valid email address.
			),
			'isUnique' => array(
				'rule' => array('_isEmailUnique'),
				'message' => '指定されたメールアドレスは既に使用されています。'
			),
			'code' => array(
				'rule' => '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i',
				'message' => '有効なメールアドレスを入力してください。'
			)
		),
		'email_confirm' => array(
			'rule' => 'email',
			'required' => 'true',
			'allowEmpty' => false,
			'message' => '有効なメールアドを入力してください。'//Please supply a valid email address.
		),
		'password' => array(
			'between' => array(
				'rule' => array('between', 4, 20),
				'message' => 'パスワードは4～20文字で必須です。' //Password must be between 8 to 20 characters
			),
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'パスワードは半角英数字のみで必須です。' //Password can only contain alphanumeric characters only
			)
		),
		'password_confirm' => array(
			'between' => array(
				'rule' => array('between', 4, 20),
				'message' => '認証パスワードは半角英数字4～20文字で必須です。' //Confirm Password must be between 8 to 20 characters.
			),
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'パスワードは半角英数字のみで必須です。'//Confirm Password can only contain alphanumeric characters only
			),
			'compare' => array(
				'rule' => array('equaltofield','password'),
				'message' => 'パスワードは一致ません。',//Password does not match
			)
		),
		'birthday' => array(
			'rule' => 'notEmpty'
		),
		'native_language' => array(
			'rule' => 'notEmpty',
			'required' => 'true',
			'message' => '母国語を選択してください。'//Please select native language
		),
		'password_new' => array(
			'between' => array(
				'rule' => array('between', 4, 20),
				'message' => 'パスワードは4～20文字で必須です。'//Password must be between 8 to 20 characters
			),
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'パスワードは半角英数字のみで必須です。' //Password can only contain alphanumeric characters only
			)
		),
		'password_confirm_new' => array(
			'between' => array(
				'rule' => array('between', 4, 20),
				'message' => 'パスワードは4～20文字で必須です。' //Confirm Password must be between 8 to 20 characters
			),
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'パスワードは半角英数字のみで必須です。'//Confirm Password can only contain alphanumeric characters only
			),
			'compare' => array(
				'rule' => array('equaltofield','password_new'),
				'message' => 'パスワードは一致ません。',//Password does not match
			)
		)
	);

	function preRegist($data) {

		App::uses('myTools','Lib');
		$hash = AuthComponent::password($this->getLastInsertId().uniqid(rand()));
		$hash16 = myTools::generateRandomStr(16);
		$device = myTools::getDevice();

		// usersデータ作成
		$savedata = array('User' => array(
#			'nickname'   => $data['nickname'],
			'email'      => $data['email'],
#			'password'   => $data['password'],
#			'gender'     => $data['gender'],
			'device'     => $device,
			'status'     => '0',
			'hash'       => $hash,
			'hash16'     => $hash16,
			'campaign_id'=> $data['campaign_id'],
		));
		$this->validate = array();
		$this->create();
		$res = $this->save($savedata);
		if (!$res) {
			return false;
		}

		// メール確認データ作成
		ClassRegistry::init('UsersEmailConfirm')->registAndSend($this->id);

	}

	function regist($data) {

		if (empty($data['user_id']) || empty($data['nickname']) || empty($data['password']) || empty($data['uec_id'])) {
			return ;
		}

		$user_id  = $data['user_id'];
		$nickname = $data['nickname'];
		$password = $data['password'];
		$uec_id   = $data['uec_id'];

		// 状態を本登録へ変更
		$this->validate = array();
		$this->read(null, $user_id);
		$this->set(array(
			'status' => 1,
			'nickname'   => $nickname,
			'password'   => $password,
		));
		$res = $this->save();

		// コース登録
		ClassRegistry::init('CourseMasterTable')->applyCourse($user_id,1,1);

		// クラス登録
		ClassRegistry::init('UsersClassTable')->add($user_id, 1, 1);

		// メール確認データ削除
		ClassRegistry::init('UsersEmailConfirm')->delete($uec_id);

		// 完了メール送信
		App::uses('myMailer','Lib');
		$user = $this->findById($user_id);
		myMailer::accountCompleteMail($user['User']);

		return 1;
	}

	public function getUserData($conditions) {
		$result = ClassRegistry::init('User')->find('all', array(
			'conditions'=>$conditions
		));
		if($result){
			return $result;
		} else {
			return '';
		}
	}

}
*/