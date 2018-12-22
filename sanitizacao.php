<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 

	if(isset($_POST['enviar'])){
		$erros = array();

		//Filtrando caracteres especiais
		$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

		//Filtrando numeros inteiros
		$idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);
		if(!filter_var($idade, FILTER_VALIDATE_INT)){
			$erros[] = "Idade inválida";
		}

		//Filtrando email
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$erros[] = "Email inválido";
		}

		//Filtrando URL
		$url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
		if(!filter_var($url, FILTER_VALIDATE_URL)){
			$erros[] = "URL inválida";
		}

		foreach ($erros as $e) {
			echo "<li> $e </li>";
		}

	}

	 ?>

	 <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
	 	<input type="text" name="nome" placeholder="Nome"><br>
        <input type="text" name="idade" placeholder="Idade"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="text" name="url" placeholder="URL"><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>