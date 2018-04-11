<!DOCTYPE HTML>
<html>
	<head>
		<style type="text/css">
			table.contacts {
				width: 100%;
			}
			table.clients thead {
				background-color: #696969;
				text-align: left;

			}
			table.clients thead th {
				border: solid 1px #fff;
				padding: 3px;
			}
			table.clients tbody td {
				border: solid 1px #eee;
				padding: 3px;
				color: #000;
			}
			a, a:hover, a:active, a:visited {
				color: #F0FFFF;
				text-decoration: underline;
			}
		</style>
	</head>
	<body>
		<div><a href="index.php?op=new_client">Adicionar Novo Cliente</a></div><br>
		<h3>Clientes</h3>
		<table class="clients" border="0" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><a href="?orderby=nome">Name</a></th>
					<th><a href="?orderby=email">Email</a></th>
					<th><a href="?orderby=dt_cadastro">Data Cadastro</a></th>
					<th><a href="?orderby=tp_pagamento">Tipo de Pagamento</a></th>
					<th>&nbsp</th>
					<th>&nbsp</th>
				</tr>
			</thead>		
			<tbody>
				<?php foreach ($clients as $client) : ?>
					<tr>	
						<td><a href="index.php?op=show_client&id=<?php echo $client->id; ?>"><?php echo htmlentities($client->nome); ?></a></td>
						<td><?php echo htmlentities($client->email); ?></td>
						<td><?php echo htmlentities($client->dt_cadastro); ?></td>
						<td><?php echo htmlentities($client->tp_pagamento); ?></td>
						<td><a href="index.php?op=edit_client&id=<?php echo $client->id; ?>">edit</a></td>
						<td><a href="index.php?op=delete_client&id=<?php echo $client->id; ?>" onclick="return confirm('Are you sure you want to delete the client?');">delete</a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>		
		</table>
	</body>
</html>