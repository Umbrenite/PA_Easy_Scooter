<?php

$admin = 'apadbadmin22';
$pwdBDD = 'Valentinlegoat0407';
$options = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
  PDO::MYSQL_ATTR_SSL_CA => $_SERVER['DOCUMENT_ROOT'].'/database/DigiCertGlobalRootCA.crt.pem',
	PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => true,
);

try {
  $bdd = new PDO('mysql:host=electrot2esgi.mysql.database.azure.com;dbname=electrotapa', $admin, $pwdBDD, $options);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
  //throw $e; // pour retourner erreur
  http_response_code(500);
  die();
}
