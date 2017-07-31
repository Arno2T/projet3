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
			if ($_GET['action']=='Posts'&& !isset($_GET['id']))
		
			{
				$this->_ctrlPosts->posts();

			}
			elseif ($_GET['action']=='Posts'&& $_GET['id']>0)
			{
				$this->_ctrlPosts->post($_GET['id']);
			}
		}
		else
		{
			$this->_ctrlHome->home();
		}
	}
}