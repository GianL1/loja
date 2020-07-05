<?php global $config; ?>

<h1>Vendas</h1>

<a href="<?php echo BASE_URL?>categorias/add" class="btn btn-default">Adicionar Categoria</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID da Compra</th>
            <th>Nome do Cliente</th>
            <th>Valor</th>
            <th>Forma Pgto</th>
            <th>Status</th>
            <th width="200px">Ações</th>
        </tr>
    </thead>

    <?php foreach($vendas as $venda): ?>
        <tr>
            <td><?php echo $venda['id']; ?></td>
            <td><?php echo $venda['nome_usuario']; ?></td>
            <td>R$ <?php echo $venda['valor'];?></td>
            <td><?php echo $venda['nome_usuario'];?></td>
            <td><?php echo $config['tipos_pgto']  [$venda['status_pg']];?></td>
            <td>
                <a href="<?php echo BASE_URL;?>/vendas/ver/<?php $venda['id']?>">Visualizar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    
</table>