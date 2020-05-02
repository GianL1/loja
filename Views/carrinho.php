<table border="0" width="100%">
    <tr>
        <th align="left">Imagem</th>
        <th align="left">Nome do Produto</th>
        <th align="left">Valor do Produto</th>
        <th align="left">Ações</th>
    </tr>
    <?php $subtotal = 0?>
    <?php foreach($produtos as $produto) : ?>
        <tr>
            <td> <img src="<?php echo BASE_URL; ?>Assets/images/<?php echo $produto['imagem'];?>" width="60" border="0"></td>
            <td><?php echo $produto['nome'];?></td>
            <td>R$: <?php echo $produto['preco'];?></td>
        </tr>
    <?php $subtotal += $produto['preco'];?>
    <?php endforeach; ?>
    <tr>
        <td colspan="2" align="right">SUBTOTAL: R$</td>
        <td align="left"><?php echo $subtotal;?></td>
    </tr>
</table>