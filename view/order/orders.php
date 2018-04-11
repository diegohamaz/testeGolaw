<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Clientes</title>
		<style type="text/css">
			table.orders {
				width: 100%;
			}
			table.orders thead {
				background-color: #696969;
				text-align: left;

			}
			table.orders thead th {
				border: solid 1px #fff;
				padding: 3px;
			}
			table.orders tbody td {
				border: solid 1px #eee;
				padding: 3px;
				color: #000;
			}
			a, a:hover, a:active, a:visited {
				color: #000;
				text-decoration: underline;
			}
		</style>
	</head>
	<body>
		<br>
		<div><a href="index.php?op=new_order">Adicionar Novo Pedido</a></div><br>
		<h3>Pedidos</h3>
		<table class="orders" border="0" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><a href="?orderby=cliente">Cliente</a></th>
					<th><a href="?orderby=produto">Produto</a></th>
					<th><a href="?orderby=quantidade">Quantidade</a></th>
					<th><a href="?orderby=valor">Valor</a></th>
					<th>&nbsp</th>
					<th>&nbsp</th>
				</tr>
			</thead>
		
			<tbody>
				<?php

				foreach ($orders as $order) : ?>		
					<tr>	
						<td><a href="index.php?op=show_order&id=<?php echo $order->id; ?>"><?php echo htmlentities($order->nome_cliente); ?></a></td>
						<td><?php echo htmlentities($order->nome_produto); ?></td>
						<td><?php echo htmlentities($order->quantidade); ?></td>
						<td><?php echo htmlentities($order->valor); ?></td>
						</tr>
				<?php endforeach; ?>
			</tbody>		
		</table>
	</body>
</html>