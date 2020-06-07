<h1>Lista de categorias</h1>

<a href="<?php echo BASE_UR?>categorias/add" class="btn btn-default">Adicionar Categoria</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Titulo</th>
            <th width="200px">Ações</th>
        </tr>
    </thead>
    <?php foreach ($categorias as $cat) :?>
        <tr>
            <td><?php echo $cat['titulo']; ?></td>
            <td>
                <a href="<?php echo BASE_URL?>categorias/edit/<?php echo $cat['id'];?>" class="btn btn-primary"> Editar </a>
                <a href="<?php echo BASE_URL?>categorias/remove/<?php echo $cat['id'];?>" class="btn btn-danger"> Excluir </a> 
            </td>
        </tr>
    <?php endforeach; ?>
</table>