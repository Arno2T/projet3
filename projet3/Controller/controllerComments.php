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

	public function commentsManager()
	{
		$comments=$this->_comments->getAllComments();

		$view= new View('CommentsManager');
		$view->generateAdmin(array('comments'=>$comments));
	}

	public function signalComment($idComment)
	{
		$this->_comments->signalComment($idComment);
	}

	public function deleteComment($idComment)
	{
		$this->_comments->deleteComment($idComment);
	}
}