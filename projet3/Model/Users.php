<?php


class Users
{

	private $_id;
	private $_login;
	private $_password;
	private $_firstName;
	private $_lastName;
	private $_email;
	private $_role;


	public function __construct($datas)
	{
		$this->hydrate($datas);
	}

	public function hydrate($datas)
	{
		foreach($datas as $key=>$value)
		{
			$method='set'.ucfirst($key);

			if(method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}

	//Setters

	public function setId($id)
	{
		$this->_id=$id;
	}

	public function setLogin($login)
	{
		$this->_login= $login;
	}


	public function setPassword($password)
	{
		$this->_password= $password;
	}

	public function setFirstName($firstName)
	{
		$this->_firstName= $firstName;
	}

	public function setLastName($lastName)
	{
		$this->_lastName=$lastName;
	}

	public function setEmail($email)
	{
		$this->_email=$email;
	}

	public function setRole($role)
	{
		$this->_role=$role;
	}


// GETTERS
	public function getId()
	{
		return $this->_id;
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

	public function getEmail()
	{
		return $this->_email;
	}

	public function getRole()
	{
		return $this->_role;
	}
}