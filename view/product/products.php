<!DOCTYPE HTML>
<html>
	<head>
		<style type="text/css">
			table.products {
				width: 100%;
			}
			table.products thead {
				background-color: #696969;
				text-align: left;

			}
			table.products thead th {
				border: solid 1px #fff;
				padding: 3px;
			}
			table.products tbody td {
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
		<hr></hr>
		<div><a href="index.php?op=new_product">Adicionar Novo Produto</a></div><br>
		<h3>Produtos</h3>
		<table class="products" border="0" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><a href="?orderby=nome">Nome</a></th>
					<th><a href="?orderby=valor">Valor</a></th>
					<th><a href="?orderby=descricao">Descricao</a></th>
					<th><a href="?orderby=foto">Foto do Produto</a></th>
					<th>&nbsp</th>
					<th>&nbsp</th>
				</tr>
			</thead>		
			<tbody>
				<?php foreach ($products as $product) : ?>
					<tr>	
						<td><a href="index.php?op=show_product&id=<?php echo $client->id; ?>"><?php echo htmlentities($product->nome); ?></a></td>
						<td><?php echo htmlentities($product->valor); ?></td>
						<td><?php echo $product->descricao; ?></td>
						<td><img src=<?php echo $product->foto;?>  width="100px" height="100px"></td>
						<td><a href="index.php?op=edit_product&id=<?php echo $product->id; ?>">edit</a></td>
						<td><a href="index.php?op=delete_product&id=<?php echo $product->id; ?>" onclick="return confirm('Are you sure you want to delete the product?');">delete</a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>		
		</table>
	</body>
</html>