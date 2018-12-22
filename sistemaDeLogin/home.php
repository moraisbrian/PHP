<?php
//importando arquivo com a conexao
require_once 'db_connect.php';

//iniciando a sessao
session_start();

//Verificacao
if(!isset($_SESSION['logado'])){
    header('Location: index.php');
}

//dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
mysqli_close($connect);

$dados = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Olá <?php echo $dados['nome']; ?></p>
    <a href="logout.php">Sair</a>
</body>
</html>