<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>
			<?php echo htmlentities($title); ?>
		</title>
	</head>
	<body>
		<h3>Add New Client</h3>
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
					<input type="text" name="name" value="<?php echo htmlentities($client->nome); ?>">
				<br>
				<label for="Email">Email: </label><br>
					<input type="text" name="email" value="<?php echo htmlentities($client->email); ?>">
				<br>
				<label for="dt_cadastro">Data Cadastro: </label><br>
					<input type="text" name="dt_cadastro" value="<?php echo htmlentities($client->dt_cadastro); ?>">
				<br>
				<label for="tp_pagamento">Tipo de Pagamento: </label><br>
					<textarea name="tp_pagamento"><?php echo htmlentities($client->tp_pagamento); ?></textarea>
				<br>

			<input type="hidden" name="form-submitted" value="1">
			<input type="submit" value="Edit">
			<button type="button" onclick="location.href='index.php'">Cancel</button>
		</form>
	</body>
</html>