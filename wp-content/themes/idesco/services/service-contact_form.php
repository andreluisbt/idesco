<?php
$email = $_POST['inputEmail'];
$name = $_POST['inputName'];
$msg = $_POST['textMsg'];

$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "From: ".$email."\r\n"; // remetente
$headers .= "Return-Path: ".$email."\r\n"; // return-path
$send = mail("andreluisbt@gmail.com", "[SITE GESTIC]", $msg, $headers);

$response = new stdClass();
if($send){
	$response->result = true;
	$response->msg = 'Mensagem enviada com sucesso';
}else{
	$response->result = false;
	$response->msg = 'A mensagem não pode ser enviada';
}
echo json_encode($response);
die;
?>