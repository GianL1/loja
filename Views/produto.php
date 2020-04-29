<div class="produto_foto">
    <img src="<?php echo BASE_URL ?>Assets/images/<?php echo $produto['imagem'];?>" alt="" border="0" width="300px" height="300px">
</div>
<div class="produto_info">
    <h2><?php echo $produto['nome']; ?></h2>
    <?php echo $produto['descricao']; ?>
    <h3>Preço R$ <?php echo $produto['preco']; ?></h3>
    <a href="<?php echo BASE_URL?>carrinho/add/<?php echo $produto['id']; ?>">Adicionar ao Carrinho</a>
</div>
<div style="clear:both"></div>