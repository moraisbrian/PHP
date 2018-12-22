<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	if(isset($_POST['enviar'])){
		$erros = array();
		if(!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)){
			$erros[] = "Idade precisa ser um inteiro";	
		}

		if(!$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
			$erros[] = "Email inválido";
		}

		if(!$peso = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_FLOAT)){
			$erros[] = "Peso inválido";
		}

		if(!$ip = filter_input(INPUT_POST, 'ip', FILTER_VALIDATE_IP)){
			$erros[] = "Ip inválido";
		}

		if(!$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL)){
			$erros[] = "URL inválida";
		}


		if(!empty($erros)){
			foreach ($erros as $valor) {
				echo "<li>$valor</li>";
			}
		}else{
			echo "Sucesso!";
		}
		
	}

	?>

	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <input type="text" name="idade" placeholder="Idade"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="text" name="peso" placeholder="Peso"><br>
        <input type="text" name="ip" placeholder="IP"><br>
        <input type="text" name="url" placeholder="URL"><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>  
</body>
</html>