<?php
namespace tisuser\Model;


// Zend\InputFilter\InputFilterAwareInterface;
//use Zend\INputFilet\InputFilterInterface;

class User  //implements InputFilterAwareInterface
{
	public $usename;
	public $password;
	public $cpassword;


public function exchangeArray($data){
/*
$this->username = isset($data['username']) ? $data['username'] : null;
$this->password = isset($data['password']) ? $data['password'] : null;
$this->cpassword = isset($data['cpassword']) ? $data['cpassword'] : null;
*/
$this->username = isset($data->username) ? $data->username : null;
$this->password = isset($data->password) ? $data->password : null;
$this->cpassword = isset($data->cpassword) ? $data->cpassword : null;

}





}