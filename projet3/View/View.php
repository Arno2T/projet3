<?php


class View

{
	private $_file;




	public function __construct($action)
	{
		$this->_file= 'View/view'. $action .'.php';
	}


	// generate datas from $datas
	public function generate($datas)
	{
		$content= $this->generateFile($this->_file, $datas); 
		$view= $this->generateFile('View/template.php', array('content'=>$content));

		
		echo $view;

	}

	public function generateAdmin($datas)
	{
		$content= $this->generateFile($this->_file, $datas);  // $datas must be an array
		$view=$this->generateFile('View/templateAdmin.php', array('content'=>$content));

		echo $view;
	}


	public function generateFile($file, $datas)
	{
		if (file_exists($file))  //checks if file exists
		{
			
			extract($datas);  //function extract() required an array

			ob_start();  //buffering datas
			include $file; // loads file

			return ob_get_clean(); // end of buffering

			
		}
		else  // if file doesn't exist 
		{
			require 'index.php';
		}

	}
}