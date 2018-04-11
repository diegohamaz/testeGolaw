<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Clientes</title>
		<style type="text/css">
			table.contacts {
				width: 100%;
			}
			table.contacts thead {
				background-color: #eee;
				text-align: left;

			}
			table.contacts thead th {
				border: solid 1px #fff;
				padding: 3px;
			}
			table.contacts tbody td {
				border: solid 1px #eee;
				padding: 3px;
			}
			a, a:hover, a:active, a:visited {
				color: blue;
				text-decoration: underline;
			}
		</style>
	</head>
	<body>

		<div><a href="index.php?op=new_order">Adicionar Novo Pedido</a></div><br>
		<table class="contacts" border="0" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><a href="?orderby=nome">Cliente</a></th>
					<th><a href="?orderby=email">Produto</a></th>
					<th><a href="?orderby=dt_cadastro">Quantidade</a></th>
					<th><a href="?orderby=tp_pagamento">Valor</a></th>
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