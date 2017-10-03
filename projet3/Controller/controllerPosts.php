<?php

require_once 'Model/PostsManager.php';
require_once 'View/View.php';


class controllerPosts
{
	private $_post;
	


	public function __construct()
	{
		$this->_post= new PostsManager();
		
	}

	//select and dipslays all posts for Episode page 
	public function posts()
	{
		$posts= $this->_post->getAllPostsByCat('Episode');
		
		$view= new View('Posts');
		$view->generate(array('posts'=>$posts));
		
	}

	
}