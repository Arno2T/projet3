<?php

require_once 'controllerPages.php';
require_once 'controllerPosts.php';
require_once 'controllerOnePost.php';
require_once 'controllerUsers.php';
require_once 'controllerAdmin.php';
require_once 'controllerPostsManager.php';
require_once 'controllerWritePost.php';
require_once 'controllerComments.php';
require_once 'controllerContact.php';
require_once 'Model/Session.php';


class Router
{
	private $_ctrlHome;
	private $_ctrlPosts;
	private $_ctrlOnePost;
	private $_ctrlUsers;
	private $_ctrlAdmin;
	private $_ctrlPostsManager;
	private $_ctrlWritePosts;
	private $_ctrlComments;
	private $_session;
	

	public function __construct()
	{
		$this->_ctrlPages= new controllerPages();
		$this->_ctrlPosts= new controllerPosts();
		$this->_ctrlOnePost= new controllerOnePost();
		$this->_ctrlUsers= new controllerUsers();
		$this->_ctrlAdmin= new controllerAdmin();
		$this->_ctrlPostsManager=new controllerPostsManager();
		$this->_ctrlWritePosts= new controllerWritePosts();
		$this->_ctrlComments=new controllerComments();
		$this->_ctrlContact= new controllerContact();
		

	}


	public function requestRouter()
	{

		
		
		if (isset($_GET['action']))
		{ 

			if ($_GET['action']=='register')
			{
				
				
				$this->_ctrlUsers->user(htmlspecialchars($_POST['login']), htmlspecialchars($_POST['password']), $_POST['password2'], $_POST['firstName'], htmlspecialchars($_POST['lastName']), htmlspecialchars($_POST['email']));
				
				
				require 'register.php';
			}

			elseif ($_GET['action'] == 'connexion')
			{
					

					$check=$this->_ctrlUsers->checkConnexion(htmlspecialchars($_POST['login']));
					
					if ($check==true)
					{
						$this->_ctrlPages->home();
						
					}
					else
					{	
						require 'connexion.php';
					}
			}

			elseif ($_GET['action'] == 'logout')
			{
				$this->_ctrlUsers->userLogout();
				require 'connexion.php';
			}

			elseif (!isset($_SESSION['login']))
			{ 
				require 'connexion.php';
			}

			else
			{
				
			
				if ($_GET['action']=='Posts'&& !isset($_GET['id']))
			
				{
					$this->_ctrlPosts->posts();

				}
				elseif ($_GET['action']=='Posts'&& $_GET['id']>0)
				{
					$this->_ctrlOnePost->post($_GET['id']);

				}
				elseif ($_GET['action']=='comment')
				{
					if (isset($_GET['submit']) && isset($_GET['idComment']) && $_GET['idComment']>0 && $_GET['submit']=='report')
					{
						$this->_ctrlComments->signalComment($_GET['idComment']);
						$this->_ctrlOnePost->post($_POST['idPost']);
					}
					else
					{
					$this->_ctrlOnePost->comment(htmlspecialchars($_POST['login']), htmlspecialchars($_POST['content']), $_POST['idPost'], $_POST['idUser']);
					$this->_ctrlOnePost->post($_POST['idPost']);
					}
				}

				elseif ($_GET['action']=='Actualities')
				{
					$this->_ctrlPages->news();
				}

				elseif ($_GET['action']=='contact')
				{	

					if (isset($_GET['submit']) && $_GET['submit']=='send')
					{
						$this->_ctrlContact->send(htmlspecialchars($_POST['subject']), htmlspecialchars($_POST['content']));
					}
					else
					{
						$this->_ctrlPages->contact();
					}
					

				}

				elseif ($_GET['action']=='a2t-admin' && !isset($_GET['module']))
				{
					$this->_ctrlUsers->checkAdmin();
					$this->_ctrlAdmin->admin();

				}
				elseif ($_GET['action']=='a2t-admin' && $_GET['module']=='Posts' && !isset($_GET['id']))
				{	

						$this->_ctrlPostsManager->postManager();

				}
				
				elseif ($_GET['action']=='a2t-admin' &&$_GET['module']=='Posts' && $_GET['id']>0)
				{
					if(isset($_GET['submit']) && $_GET['submit']=='publish')
					{
						$this->_ctrlUsers->checkAdmin();
						$this->_ctrlWritePosts->updatePost(htmlspecialchars($_POST['title']), $_POST['content'], htmlspecialchars($_POST['category']), $_GET['id']);
						$this->_ctrlPostsManager->postManager();
					}
				

					elseif(isset($_GET['submit']) && $_GET['submit']=='delete')
					{
						$this->_ctrlUsers->checkAdmin();
						$this->_ctrlPostsManager->deletePost($_GET['id']);
						$this->_ctrlPostsManager->postManager();
					}
					else
					{
						$this->_ctrlWritePosts->showPost($_GET['id']);
					}

					
				}

				elseif ($_GET['action']=='a2t-admin' && $_GET['module']=='new')
				{

					if( isset($_GET['submit']) && $_GET['submit']=='publish')
					{
						$this->_ctrlUsers->checkAdmin();
						$this->_ctrlWritePosts->newPost(htmlspecialchars($_POST['title']), $_POST['content'], htmlspecialchars($_POST['category']));
						$this->_ctrlAdmin->admin();
					}
					else
					{
						$this->_ctrlWritePosts->writeNewPost();
					}
				}

				elseif($_GET['action']=='a2t-admin' && $_GET['module']=='users' && !isset($_GET['id']))
				{
					$this->_ctrlUsers->userManager();
				}
				elseif($_GET['action']=='a2t-admin' && $_GET['module']=='users' && $_GET['id']>0)
				{
					if(isset($_GET['submit']) && $_GET['submit']=='update')
					{
						$this->_ctrlUsers->checkAdmin();
						$this->_ctrlUsers->updateUser($_POST['role'], $_GET['id']);
						$this->_ctrlUsers->userManager();
					}

					elseif(isset($_GET['submit']) && $_GET['submit']=='delete')
					{
						$this->_ctrlUsers->checkAdmin();
						$this->_ctrlUsers->deleteUser($_GET['id']);
						$this->_ctrlUsers->userManager(); 
					}
					else
					{
						$this->_ctrlUsers->showUser($_GET['id']);
					}
					
				}
				elseif($_GET['action']=='a2t-admin' && $_GET['module']=='moderate')
				{
					if(isset($_GET['id']) && isset($_GET['submit']) && $_GET['id']>0 && $_GET['submit']=='delete')
					{
						$this->_ctrlUsers->checkAdmin();
						$this->_ctrlComments->deleteComment($_GET['id']);
						$this->_ctrlComments->commentsManager();
					}
					else
					{
						$this->_ctrlComments->commentsManager();
					}
						
				}

			}
		}

			else
			{
				if (isset($_SESSION['login']))
				{
					$this->_ctrlPages->home();		

				}
				else
				{ 
				require 'connexion.php';
				}
					
			}
		
	}
}