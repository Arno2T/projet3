<?php

require_once 'Model/CommentsManager.php';
require_once 'View/View.php';

class controllerComments
{
	private $_comments;

	public function __construct()
	{
		$this->_comments= new CommentsManager();
	}

	//displays comments which are moderated
	public function commentsManager()
	{
		$comments=$this->_comments->getAllComments();

		if (!isset($comments))
		{
			$comments=[];
			$view=new View('CommentsManager');
			$view->generateAdmin(array('comments'=>$comments));
		}
		else
		{
			$view= new View('CommentsManager');
			$view->generateAdmin(array('comments'=>$comments));
		}
		
	}

	// allows to signal a comment
	public function signalComment($idComment)
	{
		$this->_comments->signalComment($idComment);
	}


	//allows to delete a comment
	public function deleteComment($idComment)
	{	$comment=$this->_comments->idComment($idComment);
		$this->_comments->deleteComment($comment);
	}
}