<?php 
require_once 'db_connect.php';

session_start();

if(isset($_POST['btn-deletar'])){
	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "DELETE FROM clientes WHERE id = '$id'";

	if(mysqli_query($connect, $sql)){
		$_SESSION['mensagem'] = "Registro deletado";
		header('Location: ../index.php');
	}else{
		$_SESSION['mensagem'] = "Erro ao deletar";
		header('Location: ../index.php');
	}
}

 ?>