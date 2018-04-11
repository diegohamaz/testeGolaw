<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<h3>Add New Product</h3>
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
				<label for="name">Nome: </label><br>
					<input type="text" name="nome" value="<?php echo htmlentities($product->nome); ?>">
				<br>
				<label for="Email">Valor: </label><br>
					<input type="text" name="valor" value="<?php echo htmlentities($product->valor); ?>">
				<br>
				<label for="dt_cadastro">Descrição: </label><br>
					<textarea name="descricao"><?php echo htmlentities($product->descricao); ?></textarea>				
				<br>
				<label for="foto">Foto: </label><br>
				<input type="text" name="foto" value="<?php echo htmlentities($product->foto); ?>">
				<br>

			<input type="hidden" name="form-submitted" value="1">
			<input type="submit" value="Edit">
			<button type="button" onclick="location.href='index.php'">Cancel</button>
		</form>
	</body>
</html>