<?php
require_once 'Model/PostsManager.php';
require_once 'Model/CommentsManager.php';
require_once  'View/View.php';

class controllerOnePost
{
	private $_post;
	private $_comment;

	public function __construct()
	{
		$this->_post= new postsManager();
		$this->_comment=new commentsManager();
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

	public function comment($author, $content, $idPost, $idUser)
	{
		$this->_comment->addComments($author, $content, $idPost, $idUser);

		//$this->post($idPost);
	}
}
