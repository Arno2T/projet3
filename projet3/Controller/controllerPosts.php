<?php

require 'Model/PostsManager.php';

class controllerPosts
{
	private $_post;


	public function __construct()
	{
		$this->_post= new PostsManager();
	}

	public function posts()
	{
		$posts= $this->_post->getAllPosts();
	
		$view= require 'View/viewPosts.php';

	}
}