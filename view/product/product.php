<!DOCTYPE html>
<html>
    <body>
        <h1><?php echo $product->nome; ?></h1>
        <div>
        <span class="label">Valor:</span>
            <?php echo $product->valor; ?>
        </div>
        <div>
            <span class="label">Descricao:</span>
            <?php echo $product->descricao; ?>
        </div>
        <div>
            <span class="label">Foto:</span>
            <img src=<?php echo $product->foto;?> />
        </div>
    </body>
</html>