<?php

require 'Model.php';

class Comments
{

	private $_id;
	private $_content;
	private $_date;


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


}
