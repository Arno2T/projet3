<?php

require_once 'View/View.php';
require_once 'Model/PostsManager.php';


class controllerPostsManager
{
	private $_post;

	public function __construct()
	{
		$this->_post=new PostsManager();
	}

	

	public function postManager()
	{
		$posts=$this->_post->getAllPosts();

		$view= new View('PostsManager');
		$view->generateAdmin(array('posts'=>$posts));
	}

	public function deletePost($idPost)
	{
		$this->_post->deletePost($idPost);
	}
}