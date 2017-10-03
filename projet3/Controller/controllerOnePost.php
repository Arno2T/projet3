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

	// Displays a post and its comments
	public function post($idPost)
	{
		
		$posts=$this->_post->getPost($idPost);	
		$comments= $this->_comment->getComments($idPost);

		if (isset($_SESSION['login']))
		{
				// generate viewPost.php 
			if (!isset($comments))
			{
				$comments=[];
				$view =new View('Post');
				$view->generate(array('posts'=>$posts, 'comments'=>$comments));
			}
			else
			{
				$view= new View('Post');
				$view->generate(array('posts'=>$posts, 'comments'=>$comments));
			}
		}
		else
		{
			if (!isset($comments))
			{
				$comments=[];
				$view =new View('PostUnlog');
				$view->generate(array('posts'=>$posts, 'comments'=>$comments));
			}
			else
			{
				$view= new View('PostUnlog');
				$view->generate(array('posts'=>$posts, 'comments'=>$comments));
			}	
		}

		
		
		

	}

	// allows to comment a post
	public function comment($author, $content, $idPost, $idUser)
	{
		if(!isset($author) || !isset($content))
		{
			echo '<div class="alert">Les mots de passe sont différents</div>'; 
		}
		else
		{
			$comment=$this->_comment->datasComment($author, $content, $idPost, $idUser);
			$this->_comment->addComments($comment);
		}

		
	}
}
