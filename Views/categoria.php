<h1>Nome da categoria: <?php echo $categoria_nome; ?></h1> <br>
<?php foreach ($produtos as $produto): ?>
    <a href="<?php echo BASE_URL;?>produto/ver/<?php echo $produto['id'];?>">
        <div class="produto">
            <img src="<?php echo BASE_URL;?>Assets/images/<?php echo $produto['imagem'];?>" alt="" border="0" width="180px" height="180px">
            <strong><?php echo $produto['nome']; ?></strong><br>
            <?php echo 'R$ '.$produto['preco'] ?>
        </div>
    </a>
<?php endforeach; ?>
<div style="clear:both"></div>

