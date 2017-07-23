<?php

require 'controllerHome.php';
require 'controllerPosts.php';



class Router
{
	private $_ctrlHome;
	private $_ctrlPosts;

	public function __construct()
	{
		$this->_ctrlHome= new controllerHome();
		$this->_ctrlPosts= new controllerPosts();
	}


	public function requestRouter()
	{
		if (isset($_GET['action']))
		{
			if ($_GET['action']=='Posts')
		
			{
				$this->_ctrlPosts->posts();

			}
		}
		else
		{
			$this->_ctrlHome->home();
		}
	}
}