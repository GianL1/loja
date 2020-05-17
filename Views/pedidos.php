<?php global $config;?>

<h1>Seus pedidos</h1>

<a href="<?php echo BASE_URL.'login/logout'?>"> Logout </a>

<table border="0" width="100%">
    <tr>
        <th>Nº do Pedido</th>
        <th>Valor Pago</th>
        <th>Forma Pgto</th>
        <th>Status do Pgto</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($pedidos as $pedido): ?>
        <tr>
            <td><?php echo  $pedido['id']; ?></td>
            <td><?php echo  $pedido['valor']; ?></td>
            <td><?php echo  $pedido['forma_pg'];?></td>
            <td><?php echo  $config['tipos_pgto'][$pedido['status_pg']]; ?></td>
            <td></td>
        </tr>
    <?php endforeach; ?>
</table>
