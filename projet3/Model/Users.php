<?php

require_once 'Model.php';

class Users
{

	private $_id;
	private $_login;
	private $_password;
	private $_firstName;
	private $_lastName;
	private $_role;


	//Setters

	public function setLogin($login)
	{
		$this->_login= $login;
	}


	public function setPassword($password)
	{
		$this->_password= $password;
	}

	public function setFirstName($first_name)
	{
		$this->_firstName= $firstName;
	}

	public function setLastName($last_name)
	{
		$this->_lastName=$lastName;
	}

	public function getLogin()
	{
		return $this->_login;
	}

	public function getPassword()
	{
		return $this->_password;
	}

	public function getFirstName()
	{
		return $this->_firstName;
	}

	public function getLastName()
	{
		return $this->_lastName;
	}
}