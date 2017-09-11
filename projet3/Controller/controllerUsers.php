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

	public function user($login, $password, $passwordVerif, $firstName, $lastName, $email)
	{	
		if (empty($login) || empty($password) || empty($firstName) || empty($lastName) || empty($email)) 
		{
			echo 'Veuillez remplir tous les champs du formulaire';
		}
		else
		{
			$check= $this->_user->checkUser($login);
			if($check['login'] == $_POST['login'])
			{
				echo 'Ce pseudo est déjà utilisé';
			}
			elseif ($check['email'] == $_POST['email'])
			{
				echo 'Ce compte existe déjà';
			}
			elseif ($password!==$passwordVerif)
			{
				echo 'Les mots de passe sont différents'; 
			}
			else
			{
				$this->_user->addUser($login, $password, $firstName, $lastName, $email);
			}
			
		}
	}

	public function userList()
	{
		$this->_user->getAllUsers();
	}

	public function showAdmin()
	{
		if ($_SESSION['role'] == 'admin')
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

	public function showUser($idUser)
	{
		$user=$this->_user->getUser($idUser);

		$view= new View('User');
		$view->generateAdmin(array('user'=>$user));
	}

	public function checkConnexion($login)
	{

		$check= $this->_user->checkUser($login);
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

	

	public function checkAdmin()
	{
		if ($_SESSION['role'] !='admin')
		{
			throw new Exception('Vous n\'avez pas les droits requis');

		}
	}


	public function userLogout()
	{
		$this->_session->destruct();
	}

	public function userManager()
	{
		$users=$this->_user->getAllUsers();

		$view=new View('Users');
		$view->generateAdmin(array('users'=>$users));
	}

	public function updateUser($role, $idUser)
	{
		$this->_user->updateUser($role, $idUser);
	}


	public function deleteUser($idUser)
	{
		$this->_user->deleteUser($idUser);
	}
}









