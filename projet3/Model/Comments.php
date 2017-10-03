<?php

class Comments
{

	private $_id;
	private $_content;
	private $_date;
	private $_idUser;
	private $_idPost;
	private $_moderate;
	private $_login;


	public function __construct($datas)
	{
		$this->hydrate($datas);
	}

	public function hydrate(array $datas)
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

	public function setLogin($login)
	{
		$this->_login=$login;
	}

	public function setId($id)
	{
		$id= (int) $id;
		$this->_id=$id;
	}

	public function setContent($content)
	{
		$this->_content = $content;
	}

	public function setDate($date)
	{
		$this->_date = $date;
	}

	public function setIdUser($idUser)
	{
		$idUser= (int) $idUser;
		$this->_idUser=$idUser;
	}

	public function setIdPost($idPost)
	{
		$idPost= (int) $idPost;
		$this->_idPost=$idPost;
	}

	public function setModerate($moderate)
	{
		$this->_moderate=$moderate;
	}


	//Getters
	public function getId()
	{
		return $this->_id;
	}

	public function getContent()
	{
		return $this->_content;
	}

	public function getDate()
	{
		return $this->_date;
	}

	public function getIdUser()
	{
		return $this->_idUser;
	}

	public function getIdPost()
	{
		return $this->_idPost;
	}

	public function getModerate()
	{
		return $this->_moderate;
	}

	public function getLogin()
	{
		return $this->_login;
	}


}
