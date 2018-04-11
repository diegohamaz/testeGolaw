<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>
			<?php echo htmlentities($title); ?>
		</title>
	</head>
	<body>
		<h3>Adicionar Novo Cliente</h3>
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
				<label for="name">Name: </label><br>
					<input type="text" name="name" value="<?php echo htmlentities($name); ?>">
				<br>
				<label for="Email">Email: </label><br>
					<input type="text" name="email" value="<?php echo htmlentities($email); ?>">
				<br>
				<label for="Address">Data Cadastro: </label><br>
					<input type="text" name="dt_cadastro" value="<?php echo htmlentities($dt_cadastro); ?>" placeholder='Formato AAAA-MM-DD ...'>
				<br>
				<label for="phone">Tipo de Pagamento: </label><br>
					<select name="tp_pagamento">
						<option value="boleto" <?php if ($tp_pagamento == 'boleto'  ) echo ' selected="selected"'; ?>>Boleto</option>
						<option value="cartao_credito" <?php if ($tp_pagamento == 'cartao_credito') echo ' selected="selected"'; ?>>Cartão de Crédito</option>
						<option value="transferencia" <?php if ($tp_pagamento == 'transferencia') echo ' selected="selected"'; ?>>Transferência</option>
					</select>			
				<br>
			<input type="hidden" name="form-submitted" value="1">
			<input type="submit" value="Submit">
			<button type="button" onclick="location.href='index.php'">Cancel</button>
		</form>
	</body>
</html>