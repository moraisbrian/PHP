<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 
	if(isset($_POST['enviar'])){
		$formatosPermitidos = array("png", "jpg", "gif", "txt");
		$extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

		if(in_array($extensao, $formatosPermitidos)){
			$pasta = "arquivos/";
			$temporario = $_FILES['arquivo']['tmp_name'];
			$novoNome = uniqid().".$extensao";

			if(move_uploaded_file($temporario, $pasta.$novoNome)){
				$mensagem = "Sucesso!";
			}else{
				$mensagem = "Não foi possível fazer o upload";
			}

		}else{
			$mensagem = "Formato inválido";
		}
		echo $mensagem;
	}

	 ?>

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
		<input type="file" name="arquivo">
		<input type="submit" name="enviar" value="Enviar">

	</form>

</body>
</html>