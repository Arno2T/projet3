<?php

require 'View/template.php';

class ControllerHome
{
	private $_home;


	public function home()
	{
		$this->_home= require 'View/viewHome.php' ;
	}

}