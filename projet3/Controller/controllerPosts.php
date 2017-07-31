<?php

require_once 'Model/PostsManager.php';
require_once 'View/View.php';
require_once 'Model/CommentsManager.php';

class controllerPosts
{
	private $_post;
	private $_comment;


	public function __construct()
	{
		$this->_post= new PostsManager();
		$this->_comment= new CommentsManager();
		
	}

	//select and dipslay all posts
	public function posts()
	{
		$posts= $this->_post->getAllPosts();
		
		$view= new View('Posts');
		$view->generate(array('posts'=>$posts));
		
	}

	//Select post from id
	public function post($idPost)
	{
		$post= $this->_post->getPost($idPost);
		
		$comments= $this->_comment->getComments($idPost);

		// generate viewPost.php 
		$view =new View('Post');
		$view->generate(array('post'=>$post, 'comments'=> $comments));

	}
}