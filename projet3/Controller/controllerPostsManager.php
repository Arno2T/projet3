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

	
	// Displays all posts for post Manager page
	public function postManager()
	{
		$posts=$this->_post->getAllPosts();

		$view= new View('PostsManager');
		$view->generateAdmin(array('posts'=>$posts));
	}

	// allows to delete a post
	public function deletePost($idPost)
	{
		$datas= $this->_post->datasDelete($idPost);
		$this->_post->deletePost($datas);
	}
}