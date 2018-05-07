<?php 
require_once 'vendor/autoload.php';
require_once 'Email.php';

$array = array(
	'emailsend' => array(
		"formatech16@gmail.com","vinialves08@gmail.com","vinicius.silva@cepeduc.com"
	),
	'subject' => "Envio usando a classe de Email",
	'contents' => "contents"
);

$email = new Email();

if ($email->enviar($array)) {
	echo "Email enviado com sucesso!!";
}else{
	echo "Erro ao enviar!!";
}

 ?>