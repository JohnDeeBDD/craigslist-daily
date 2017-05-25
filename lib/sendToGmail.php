<?php

function sendToGmail($username, $password, $to, $from, $subject, $body) {

	//require_once 'lib/swift_required.php';
	
	$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
	->setUsername($username)
	->setPassword($password);
	
	$mailer = Swift_Mailer::newInstance($transport);
	
	$message = Swift_Message::newInstance('Test Subject')
	//->setFrom(array('abc@example.com' => 'ABC'))
	->setFrom($from)
	->setTo($to)
	->setSubject($subject)
	->setBody($body);
	
	$result = $mailer->send($message);
}
?>