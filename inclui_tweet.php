<?php
	
	session_start();

	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$texto_tweet = $_POST['texto_tweet'];
	$id_usuario = $_SESSION['id_usuario'];

	//impede de inserir campo vazio no banco
	if($texto_tweet == '' || $id_usuario == ''){
		die();
	}

	$objDB = new db();
	$link = $objDB->conecta_mysql();

	$sql = " INSERT INTO tweet(id_usuario, tweet) VALUES ($id_usuario, '$texto_tweet') "; 

	mysqli_query($link, $sql);

?>