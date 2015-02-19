<?php

App::uses('AppController', 'Controller');
class myMailer{

  public Static function testMail($user){
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
    $email->config('default');
    $email->emailFormat('text');
    $email->template('sample');
    $email->viewVars(array('user' => $user));
    $email->to($user['email']);
    $email->subject('About1');
    $email->send();
  }
  
  public Static function activationMail($user,$hash){
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
    $email->config('default');
    $email->emailFormat('text');
    $email->template('account_activation');
    $email->viewVars(array('user' => $user,'hash'=>$hash));
    $email->to($user['email']);
    $email->bcc(Configure::read('my.admin_email'));
#    $email->subject(__('Account Activation').' - '.Configure::read('my.site_name'));
    $email->subject("★＜ネイティブキャンプ英会話＞無料体験コースお申込ありがとうございます★");
    $email->send();
  }
  
  
  public Static function accountCompleteMail($user){
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
    $email->config('default');
    $email->domain('nativecamp.net');
    $email->emailFormat('text');
    $email->template('account_complete');
    $email->viewVars(array('name' => $user['nickname']));
    $email->to($user['email']);
    $email->from('info@nativecamp.net', 'NativeCamp運営事務局');
    $email->replyTo('info@nativecamp.net');
    $email->returnPath('info@nativecamp.net', 'NativeCamp運営事務局');
#    $email->subject(__('Account Activation').' - '.Configure::read('my.site_name'));
    $email->subject("ネイティブキャンプ：事前登録完了メール");
    $email->send();
  }
  
  public Static function changeEmailAddress($user,$hash){
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
    $email->config('default');
    $email->emailFormat('text');
    $email->template('change_email_address');
    $email->viewVars(array('user' => $user,'hash'=>$hash));
    $email->to($user['new_email']);
    $email->subject('★＜ネイティブキャンプ英会話＞メールアドレスの変更完了しました★');
    $email->send();
  }
    
  public Static function forgotMail($user,$hash){
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
    $email->config('default');
    $email->emailFormat('text');
    $email->template('forgot');
    $email->viewVars(array('user' => $user,'hash'=>$hash));
    $email->to($user->email);
    $email->bcc(Configure::read('my.admin_email'));
#    $email->subject(__('Forgot Password').' - '.Configure::read('my.site_name'));
    $email->subject("★＜＜＜ネイティブキャンプ英会話＞パスワード再確認メール＞＞＞★");
    $email->send();
  }
  
  public Static function forgotTeacherMail($teacher,$hash){
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
    $email->config('default');
    $email->emailFormat('text');
    $email->template('forgot');
    $email->viewVars(array('teacher' => $teacher,'hash'=>$hash));
    $email->to($teacher->email);
    $email->bcc(Configure::read('my.admin_email'));
    $email->subject(__('Forgot Password').' - '.Configure::read('my.site_name'));
    $email->send();
  }
  
  public Static function inquiryMail($userNickname,$inquiryData,$id){
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
    $email->config('default');
    $email->emailFormat('text');
    $email->template('inquiry');
    $email->viewVars(array('userNickname' => $userNickname ,'inquiryData' => $inquiryData,'id'=>$id));
    $email->to($inquiryData['email']);
    $email->from('info@nativecamp.net');
    $email->subject('★＜ネイティブキャンプ英会話＞お問い合わせ受付完了しました★');
    $email->send();
  }

  public Static function sendMailMagazin($from_email,$to_email, $subject, $body){
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
    $email->from($from_email, 'NativeCamp運営事務局');
    $email->to($to_email);
    $email->subject($subject);
    $email->send($body);  
  }
}