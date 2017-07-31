<?php

require 'Model.php';

class Comments
{

	private $_id;
	private $_content;
	private $_date;
	private $_idUsers;
	private $_idPost;

	public function hydrate($datas)
	{
		foreach($data as $key => $value)
		{
			$method= 'set'.ucfirst($key);
			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}


	//Setters
	public function setContent($content)
	{
		$this->_content = $content;
	}

	public function setDate($date)
	{
		$this->_date = $date;
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

	public function getIdUsers()
	{
		return $this->_idUsers;
	}

	public function getIdPosts()
	{
		return $this->_idPosts;
	}


}
