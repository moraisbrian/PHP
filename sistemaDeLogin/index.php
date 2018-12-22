<?php
//importando arquivo com a conexao
require_once 'db_connect.php';

//iniciando a sessao
session_start();

//verificando se o usuário clicou no botão submit
if(isset($_POST['btn-entrar'])){
    //array de erros
    $erros = array();

    //variáveis com valores digitados pelo usuário
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    //verificando se os campos foram preenchidos
    if(empty($login) || empty($senha)){
        $erros[] = "<li>O Campo login/senha precesa ser preenchido</li>";
    }else{
        //se os campos foram preenchidos o select é armazenado em uma variavel
        $sql = "SELECT login FROM usuarios WHERE login = '$login'";
        $resultado = mysqli_query($connect, $sql);

        //criptografando a senha
        $senha = md5($senha);

        //verificando se o usuário foi encontrado no bd
        if(mysqli_num_rows($resultado) > 0){
            $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
            $resultado = mysqli_query($connect, $sql);
            mysqli_close($connect);
            
            //verificando se retornou linhas
            if(mysqli_num_rows($resultado) == 1){
                $dados = mysqli_fetch_array($resultado);
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];
                header('Location: home.php');
            }else{
                $erros[] = "<li>senha inválida</li>";
            }
        }else{
            $erros[] = "<li>Usuário inexistente</li>";
        }
    }

    
}
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
    <div style="margin: 10px auto; width: 50%">
    <h1>Login</h1>

    <?php
    //exibindo array de erros
    if(!empty($erros)){
        foreach ($erros as $e) {
            echo $e;
        }
    }
    ?>

    <form action="" method="POST">
        Login: <input type="text" name="login"><br>
        Senha: <input type="password" name="senha"><br>
        <button type="submit" name="btn-entrar">Entrar</button>
    </form>
    </div>
</body>
</html>