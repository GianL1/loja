<h1>Lista de produtos</h1>

<a href="<?php echo BASE_URL?>produtos/add" class="btn btn-default">Adicionar Categoria</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Imagem</th>
            <th>Categoria</th>
            <th>Produto</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th width="200px">Ações</th>
        </tr>
    </thead>
    <?php foreach ($produtos as $produto) :?>
        <tr>
            <td><img src="http://localhost/php/loja/Assets/images/<?php echo $produto['imagem'];?>" border="0" height="80"></td>
            <td><?php echo $produto['nome']; ?></td>
            <td><?php echo $produto['categoria']; ?></td>
            <td><?php echo '$ '.$produto['preco']; ?></td>
            <td><?php echo $produto['quantidade']; ?></td>
            <td>
                <a href="<?php echo BASE_URL?>produtos/edit/<?php echo $produto['id'];?>" class="btn btn-primary"> Editar </a>
                <a href="<?php echo BASE_URL?>produtos/remove/<?php echo $produto['id'];?>" class="btn btn-danger"> Excluir </a> 
            </td>
        </tr>
    <?php endforeach; ?>
</table>