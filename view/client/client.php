<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $client->nome; ?></title>
    </head>
    <body>
        <h1><?php echo $client->nome; ?></h1>
        <div>
        <span class="label">Email:</span>
            <?php echo $client->email; ?>
        </div>
        <div>
            <span class="label">Data Cadastro:</span>
            <?php echo $client->dt_cadastro; ?>
        </div>
        <div>
            <span class="label">Tipo de Pagamento:</span>
            <?php echo $client->tp_pagamento; ?>
        </div>
    </body>
</html>