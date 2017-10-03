<?php

class controllerContact
{

	// send a mail 
	public function send($subject, $message)
	{
		
		$headers= 'De: '.$_POST['name'].'\r\n'.
					'email: '.$_POST['email'].'\r\n' ;


		$mail=mail('arnaud.tortora@gmail.com', $subject, $message, $headers);


		return $mail;
	}
}