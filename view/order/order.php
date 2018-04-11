<!DOCTYPE html>
<html>
    <body>       
        <div>
        <span class="label">Nome Cliente:</span>
            <?php echo $orders->nome_cliente; ?>
        </div>
        <div>
            <span class="label">Nome Produto:</span>
            <?php echo $orders->nome_produto; ?>
        </div>
        <div>
            <span class="label">Quantidade:</span>
            <?php echo $orders->quantidade; ?>
        </div>
            <div>
            <span class="label">Valor:</span>
            <?php echo $orders->valor; ?>
        </div>
        <button type="button" onclick="location.href='index.php'">Voltar</button>
    </body>
</html>