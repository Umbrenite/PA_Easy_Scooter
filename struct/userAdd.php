<?php

session_start();

require "functions.php";


//Éviter la faille XSS
//not empty pour les required
//isset pour les non required
//nombre exact

if(
	empty($_POST['email']) ||
	!isset($_POST['firstname']) ||
	!isset($_POST['lastname']) ||
	empty($_POST['password']) ||
	empty($_POST['pwdConfirm']) ||
	count($_POST) != 5
){
	die("Tentative de hack ...");
}



//nettoyage des champs
$firstname = ucwords(strtolower(trim($_POST["firstname"])));
$email = strtolower(trim($_POST["email"]));
$lastname = strtoupper(trim($_POST["lastname"]));
$pwd = $_POST["password"];
$pwdConfirm = $_POST["pwdConfirm"];




//vérification des champs un par un
$errors = [];

//Email : format

if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
	$errors[] = "Votre email est incorrect";
}else{

	//Connexion en bdd
	$pdo = connectDB();

	//Donne l'utilisateur en bdd pour l'email en question
	$queryPrepared = $pdo->prepare("SELECT id FROM ".DBNAME."_users WHERE email=:email LIMIT 1");

	$queryPrepared->execute(["email"=>$email]);

	$result = $queryPrepared->fetch();

	//Si le résultat existe on alimente le tableau $error
	if(!empty($result)){
		$errors[] = "Votre email existe déjà en bdd";
	}

}


//Prénom : Min 2 caractères Max 32
if( strlen($firstname)==1 || strlen($firstname)>32){
	$errors[] = "Votre prénom doit faire plus de 2 caractères";
}

//Nom : Min 2 caractères Max 100
if( strlen($lastname)==1 || strlen($lastname)>100){
	$errors[] = "Votre nom doit faire plus de 2 caractères";
}

//pwd : Min 8 caractères
if( strlen($pwd)<8 ){
	$errors[] = "Votre mot de passe doit faire plus de 7 caractères avec une minuscule, une majuscule et un chiffre";
}

//Pwd confirm = pwd
if($pwd != $pwdConfirm){
	$errors[] = "Votre mot de passe de confirmation ne correspond pas";
}

if( count($errors) == 0){
	
	

	//PDO voit qu'il n'y a qu'une seule requête
	$queryPrepared = $pdo->prepare("INSERT INTO ".DBNAME."_users (email, firstname, lastname, pass) VALUES (:email, :firstname, :lastname, :pwd)");


	//bcrypt, md5, SHA1, SHA256

	$pwd = password_hash($pwd, PASSWORD_DEFAULT);

	$queryPrepared->execute([
								"email"=>$email,
								"firstname"=>$firstname,
								"pwd"=>$pwd,
								"lastname"=>$lastname,
							]);
	

	header("Location: ../login.php");

}else{
	$_SESSION['errors'] = $errors;
	header("Location: ../newaccount.php");
}