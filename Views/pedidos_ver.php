<?php global $config; ?>

<h1>Detalhes do Pedido</h1>

<table border="0" width="100%">
    <tr>
        <th>Nº do Pedido</th>
        <th>Valor Pago</th>
        <th>Forma de Pgto</th>
        <th>Status do Pgto</th>
        <th>Ações</th>
    </tr>
    <tr>
        <td><?php echo $pedido['id']; ?></td>
        <td><?php echo $pedido['valor']; ?></td>
        <td><?php echo $pedido['forma_pg']; ?></td>
        <td><?php echo $config['status_pgto'][$pedido['status_pg']]; ?></td>
        <td><a href=""></a> | <a href=""></a></td>
    </tr>
</table>

<hr>

<?php foreach($pedidos['produtos'] as $produto): ?>
    <div class="pedido_produto">
        <img src="<?php echo BASE_URL?>Assets/imagens/<?php $produto['imagem']; ?>" border="0" width="100%"><br>
        <?php echo $produto['nome']; ?>
        R$: <?php echo $produto['preco']; ?>
        Quantidade: <?php echo $produto['quantidade']; ?>
    </div>
<?php endforeach; ?>