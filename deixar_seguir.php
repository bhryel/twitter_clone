<?php
	
	session_start();

	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$id_usuario = $_SESSION['id_usuario'];
	$deixar_seguir_id_usuario = $_POST['deixar_seguir_id_usuario'];

	//impede de inserir campo vazio no banco
	if($id_usuario == '' || $deixar_seguir_id_usuario == ''){
		die();
	}

	$objDB = new db();
	$link = $objDB->conecta_mysql();

	$sql = " DELETE FROM usuarios_seguidores WHERE id_usuario = $id_usuario AND seguindo_id_usuario = $deixar_seguir_id_usuario ";

	mysqli_query($link, $sql);

?>