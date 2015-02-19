<?php
class myTools {
	
	public static function display($data) {
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

	public static function genders() {
		return array('1' => 'Male', '2' => 'Female');
	}

	public static function validation($data){
    $errors = array();
    foreach($data as $vars){
      foreach($vars as $var){
        $errors[] = $var;
      }
    }
    return $errors;
  }

  public static function getDevice() {
		App::import('Vendor','MobileDetect');
		$MobileDetect = new MobileDetect();
		if (!$MobileDetect->isMobile()) {
			return 1; //PC
		} else {
			if ($MobileDetect->isAndroidOS()) {
				return 2; //Android
			} elseif($MobileDetect->isiOS()) {
				return 3; //iOS
			} else {
				return 0; //unknown
			}
		}
	}
}
?>