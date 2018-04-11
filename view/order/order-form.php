<!DOCTYPE HTML>
<html>
	<body>
		<h3>Adicionar Novo Pedido</h3>
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
				<label for="name">Cliente: </label><br>
					<select name="clientes">
					<option value=""> Selecione o cliente...</option>
						<?php
					foreach($clients as $client){
						echo '<option value="' .$client->id . '">'. htmlspecialchars($client->nome). '</option>';
					}?>
					
					</select>
				<br>
				<label for="Email">Produto: </label><br>
					<select name="produtos">
					<option value=""> Selecione o produto...</option>
					<?php
					foreach($products as $product){
						echo '<option value="' .$product->id . '">'. htmlspecialchars($product->nome). '</option>';
					}?>
					</select>
				<br>
				<label for="Address">Quantidade: </label><br>
					<input type="text" name="quantidade" value="<?php echo htmlentities($email); ?>">
				<br>
				<label for="phone">Valor: </label><br>
					<input type="text" name="valor" value="<?php echo htmlentities($email); ?>">		
				<br>
			<input type="hidden" name="form-submitted" value="1">
			<input type="submit" value="Submit">
			<button type="button" onclick="location.href='index.php'">Cancel</button>
		</form>
	</body>
</html>