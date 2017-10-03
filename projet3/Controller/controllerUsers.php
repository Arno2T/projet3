<?php

require_once 'Model/UsersManager.php';
require_once 'Model/Session.php';
require_once 'View/View.php';

class controllerUsers
{
	private $_user;
	private $_session;


	public function __construct()
	{
		$this->_user=new UsersManager();
		$this->_session= new Session();
	}

	//allows to add an user and checks if user already exists.
	public function user($login, $password, $passwordVerif, $firstName, $lastName, $email)
	{	
		

		if (empty($login) || empty($password) || empty($firstName) || empty($lastName) || empty($email)) 
		{
			echo '<div class="alert">Veuillez remplir tous les champs du formulaire</div>';
		}
		else
		{	
			$user=$this->_user->datasCheck($login);
			$check= $this->_user->checkUser($user);
			if($check['login'] == $_POST['login'])
			{
				echo '<div class="alert">Ce pseudo est déjà utilisé</div>';

			}
			elseif ($check['email'] == $_POST['email'])
			{
				echo '<div class="alert">Ce compte existe déjà</div>';
			}
			elseif ($password!==$passwordVerif)
			{
				echo '<div class="alert">Les mots de passe sont différents</div>'; 
			}
			else
			{
				$newUser=$this->_user->datasUser($login, $password, $firstName, $lastName, $email);
				$this->_user->addUser($newUser);
			}
			
		}
	}

	// selects all users
	public function userList()
	{
		$this->_user->getAllUsers();
	}

	// displays link for Admin's page
	public function showAdmin()
	{
		if (!isset($_SESSION['role']))
		{
			$_SESSION['adminLink']="";
			return $_SESSION['adminLink'];	
		}
		elseif ($_SESSION['role'] == 'admin')
		{
			$_SESSION['adminLink']= '<li><a href="index.php?action=a2t-admin">Administration</a></li>';
			return $_SESSION['adminLink'];
			
		}
		else
		{
			$_SESSION['adminLink']="";
			return $_SESSION['adminLink'];	
		}

	}

	public function showLogOut()
	{
		if(!isset($_SESSION['login']))
		{
			$_SESSION['logOutLink']="";
			return $_SESSION['logOutLink'];
		}
		else
		{
			$_SESSION['logOutLink']='<li><a href="index.php?action=logout">Déconnexion</a></li>';
		}
	}

	//displays user from $idUser
	public function showUser($idUser)
	{
		$user=$this->_user->getUser($idUser);

		$view= new View('User');
		$view->generateAdmin(array('user'=>$user));
	}

	// checks user's id and sets session attributes
	public function checkConnexion($login)
	{
		$user=$this->_user->datasCheck($login);
		$check= $this->_user->checkUser($user);
		if ($check['login'] == $login)
		{
			$hash= $check['password'];
			if(password_verify(htmlspecialchars($_POST['password']),$hash))
			{
				$this->_session->setAttribute('login', $login);
				$this->_session->getAttribute('login');
				$this->_session->setAttribute('role', $check['role']);
				$this->_session->getAttribute('role');
				$this->_session->setAttribute('id', $check['id']);
				$this->_session->getAttribute('id');
				$this->showAdmin();
				$this->showLogOut();
				return true;
			}
			else
			{
				echo 'erreur de mot de passe';
				return false;
			}
		}
		else
		{
			echo 'erreur de login';
			return false;
		}
	}

	
	// checks if user is Admin
	public function checkAdmin()
	{
		if ($_SESSION['role'] !='admin')
		{
			throw new Exception('Vous n\'avez pas les droits requis');

		}
	}


	// allows to logout
	public function userLogout()
	{
		$this->_session->destruct();
		$this->showAdmin();
		$this->showLogOut();
	}

	// displays all users for Admin's page
	public function userManager()
	{
		$users=$this->_user->getAllUsers();

		$view=new View('Users');
		$view->generateAdmin(array('users'=>$users));
	}

	// manages user's role
	public function updateUser($idUser, $role)
	{
		$user=$this->_user->datasUpdate($idUser, $role);
		$this->_user->updateUser($user);
	}


	// allows to delete an user
	public function deleteUser($idUser)
	{
		$user= $this->_user->datasDelete($idUser);
		$this->_user->deleteUser($user);
	}
}









