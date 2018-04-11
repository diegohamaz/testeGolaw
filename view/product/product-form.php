<!DOCTYPE HTML>
<html>
	<body>
		<h3>Adicionar Novo Produto</h3>
		<?php
			if ($errors) {
				echo '<ul class="errors">';
				foreach ($errors as $field => $error) {
					echo '<li>' . htmlentities($error) . '</li>';
				}
				echo '</ul>';
			}
		?>
		<form method="post" action="">
				<label for="name">Nome do Produto: </label><br>
					<input type="text" name="nome" value="<?php echo htmlentities($nome); ?>">
				<br>
				<label for="Email">Valor: </label><br>
					<input type="text" name="valor" value="<?php echo htmlentities($valor); ?>"  style="width:200px" placeholder="Insira no formato Decimal(10,2)">
				<br>
				<label for="Address">Descrição: </label><br>
					<textarea name="descricao"><?php echo htmlentities($descricao); ?></textarea>
				<br>
				<label for="phone">Foto: </label><br>
					<input type="text" name="foto" value="<?php echo htmlentities($foto); ?>" style="width:300px" placeholder="Insira um link de imagem válido..">		
				<br>
			<input type="hidden" name="form-submitted" value="1">
			<input type="submit" value="Submit">
			<button type="button" onclick="location.href='index.php'">Cancel</button>
		</form>
	</body>
</html>