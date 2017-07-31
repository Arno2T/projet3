<?php


class View

{
	private $_file;




	public function __construct($action)
	{
		$this->_file= 'View/view'. $action .'.php';
	}

	public function generate($datas)
	{
		$content= $this->generateFile($this->_file, $datas);
		$view= $this->generateFile('View/template.php', array('content'=>$content));

		
		echo $view;


		

	}

	public function generateFile($file, $datas)
	{
		if (file_exists($file))
		{
			extract($datas);

			ob_start();

			require $file;

			return ob_get_clean();

			
		}
		else
		{
			require 'index.php';
		}

	}
}