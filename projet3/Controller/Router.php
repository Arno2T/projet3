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
	private $_ctrlPages;
	

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
		$this->_ctrlUsers->showAdmin();
		$this->_ctrlUsers->showLogOut();

		
		if (isset($_GET['action']))
		{ 
			//---- REGISTER ----//
			if ($_GET['action']=='register')
			{
				
				$this->_ctrlUsers->user(htmlspecialchars($_POST['login']), htmlspecialchars($_POST['password']), $_POST['password2'], htmlspecialchars($_POST['firstName']), htmlspecialchars($_POST['lastName']), htmlspecialchars($_POST['email']));
				
				
				require 'register.php';
			}
			//---- CONNEXION ----//
			elseif($_GET['action']=='connexion')
			{
				if(isset($_GET['submit']) && $_GET['submit']=='connexion')
				{
					$check=$this->_ctrlUsers->checkConnexion(htmlspecialchars($_POST['login']));
						if($check==true)
						{
							$this->_ctrlPosts->posts();
						}
						else
						{
							$this->_ctrlPages->connexion();
						}
				}
				else
				{
					$this->_ctrlPages->connexion();
				}
				
			}
			
			//---- logout ----//
			elseif ($_GET['action'] == 'logout')
			{
				$this->_ctrlUsers->userLogout();
				$this->_ctrlUsers->showAdmin();
				$this->_ctrlUsers->showLogOut();
				$this->_ctrlPages->home();
				
			}

			else
			{
				//---- POSTS ----//

				if ($_GET['action']=='Posts'&& !isset($_GET['id']))
			
				{
					$this->_ctrlPosts->posts(); // show all posts

				}
				elseif ($_GET['action']=='Posts'&& $_GET['id']>0)
				{
					$this->_ctrlOnePost->post($_GET['id']); // show a post

				}
				elseif ($_GET['action']=='comment') // comment a post 
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
				//---- ACTUALITES ----//
				elseif ($_GET['action']=='Actualities')
				{
					$this->_ctrlPages->news();
				}
				//---- CONTACT ----//
				elseif ($_GET['action']=='contact')
				{	

					if (isset($_GET['submit']) && $_GET['submit']=='send')
					{
						$this->_ctrlContact->send(htmlspecialchars($_POST['subject']), htmlspecialchars($_POST['content']));
						$this->_ctrlPages->contact();
					}
					else
					{
						$this->_ctrlPages->contact();
					}
					

				}
		//--------  ADMIN  --------- //
				elseif ($_GET['action']=='a2t-admin' && !isset($_GET['module']))
				{
					$this->_ctrlUsers->checkAdmin();
					$this->_ctrlAdmin->admin();

				}

				//---- POSTSMANAGER ----//
				elseif ($_GET['action']=='a2t-admin' && $_GET['module']=='Posts' && !isset($_GET['id']))
				{	

						$this->_ctrlPostsManager->postManager(); //show all post

				}

				elseif ($_GET['action']=='a2t-admin' &&$_GET['module']=='Posts' && $_GET['id']>0)
				{	// Update a post
					if(isset($_GET['submit']) && $_GET['submit']=='publish')
					{
						$this->_ctrlUsers->checkAdmin();
						$this->_ctrlWritePosts->updatePost($_GET['id'], htmlspecialchars($_POST['title']), $_POST['content'], htmlspecialchars($_POST['category']));
						$this->_ctrlPostsManager->postManager();
					}
				
					// delete a post
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
				// Write a new post
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
				//--- USERMANAGER ---//
				elseif($_GET['action']=='a2t-admin' && $_GET['module']=='users' && !isset($_GET['id']))
				{
					$this->_ctrlUsers->userManager(); // show all users
				}
				elseif($_GET['action']=='a2t-admin' && $_GET['module']=='users' && $_GET['id']>0)
				{
					if(isset($_GET['submit']) && $_GET['submit']=='update') // update an user
					{
						$this->_ctrlUsers->checkAdmin();
						$this->_ctrlUsers->updateUser($_GET['id'], $_POST['role']);
						$this->_ctrlUsers->userManager();
					}

					elseif(isset($_GET['submit']) && $_GET['submit']=='delete') //delete user
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
				elseif($_GET['action']=='a2t-admin' && $_GET['module']=='moderate') //moderate comments
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

			else //if $_GET['action'] is not setted
			{
				
					$this->_ctrlPages->home();	//displays HomePage	
			}
		
	}
}