<?php

class controllerContact
{

	public function send($subject, $message)
	{
		var_dump('test mail');
		$headers= 'De: '.$_POST['name'].'\r\n'.
					'email: '.$_POST['email'].'\r\n' ;

		var_dump($headers);

		$mail=mail('arnaud.tortora@gmail.com', $subject, $message, $headers);

		var_dump($message);

		return $mail;
	}
}