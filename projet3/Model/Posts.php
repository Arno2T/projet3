<?php


class Posts
{
	private $_id;
	private $_title;
	private $_content;
	private $_date;
	private $_idUser;
	private $_category;


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

	public function getResume()
	{
		return substr($this->getContent(), 0, 500);
	}

	//Setters

	public function setId($id)
	{
		$id= (int) $id;
		$this->_id=$id;
	}

	public function setTitle($title)
	{
		if (is_string($title))
		{
			$this->_title = $title;
		}
		
	}

	public function setContent($content)
	{
		if (is_string($content))
		{
		    $this->_content = $content;	
		}
		
	}

	public function setDate($date)
	{
		$this->_date = $date;
	}

	public function setIdUser($idUser)
	{	$idUser= (int) $idUser;
		$this->_idUser= $idUser;
	}

	public function setCategory($category)
	{
		$this->_category=$category;
	}


	//Getters

	public function getId()
	{
		return $this->_id;
	}

	public function getTitle()
	{
		return $this->_title;
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

	public function getCategory()
	{
		return $this->_category;
	}
}