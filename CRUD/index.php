<?php 
include_once 'includes/header.php';

include_once 'php_action/db_connect.php';

include_once 'includes/mensagem.php';
?>


<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light">Sistema de clientes</h3>
		<table class="striped">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Sobrenome</th>
					<th>Email</th>
					<th>Idade</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$sql = "SELECT * FROM clientes";
				$resultado = mysqli_query($connect, $sql);

				while ($dados = mysqli_fetch_array($resultado)):
					
					?>
					<tr>
						<td><?php echo $dados['nome']; ?></td>
						<td><?php echo $dados['sobrenome']; ?></td>
						<td><?php echo $dados['email']; ?></td>
						<td><?php echo $dados['idade'] ?></td>
						<td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
						<td><a href="#modal<?php echo $dados['id']; ?>"class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

						<!-- Modal Structure -->
						<div id="modal<?php echo $dados['id']; ?>" class="modal">
							<div class="modal-content">
								<h4>Atenção</h4>
								<p>Deseja realmente excluir o registro?</p>
							</div>
							<form action="php_action/delete.php" method="POST">
							<div  style="margin: 10px auto; width: 30%" >
								<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
								<input type="submit" name="btn-deletar" value="Deletar" class="btn red">
								<a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
							</div>
						</form>
					</div>

				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
	<br>
	<a href="adicionar.php" class="btn">Adicionar cliente</a>
</div>
</div>

<?php 
include_once 'includes/footer.php';
?>