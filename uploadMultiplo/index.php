<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 
	if(isset($_POST['enviar'])){
		$formatosPermitidos = array("png", "jpg", "gif", "txt");
		$contador = 0;
		$quantidadeArquivos = count($_FILES['arquivo']['name']);

		while ($contador < $quantidadeArquivos) {

			$extensao = pathinfo($_FILES['arquivo']['name'][$contador], PATHINFO_EXTENSION);

			if(in_array($extensao, $formatosPermitidos)){
				$pasta = "arquivos/";
				$temporario = $_FILES['arquivo']['tmp_name'][$contador];
				$novoNome = uniqid().".$extensao";

				if(move_uploaded_file($temporario, $pasta.$novoNome)){
					echo "Upload feito com sucesso para $pasta$novoNome<br>";
				}else{
					echo "Erro ao enviar $temporario<br>";
				}

			}else{
				echo "Extensão $extensao não permitida<br>";
			}
			$contador++;
		}

	}

	?>

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
		<input type="file" name="arquivo[]" multiple>
		<input type="submit" name="enviar" value="Enviar">

	</form>

</body>
</html>