<h1>Produtos - Editar</h1>


<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group" style="width:400px">
    <input type="text" class="form-control" placeholder="Nome do Produto" name="produto" value="<?php echo $produto['nome']; ?>">
  </div>

  <div class="form-group" style="width:400px">
    <input type="text" class="form-control" placeholder="Descrição" name="descricao" value="<?php echo $produto['descricao']; ?>">
  </div>

  <select name="categoria">
    <?php foreach ($categorias as $categoria): ?>
        <option value="<?php echo $categoria['id']; ?>" 
            <?php echo ($categoria['id'] == $produto['id_categoria']) ? "selected = 'selected'" : '' ; ?>
        >   <?php echo $categoria['titulo']; ?>
        </option>
    <?php endforeach; ?>
  </select><br><br>

  <div class="form-group" style="width:400px">
    <input type="number" class="form-control" placeholder="Preço" name="preco" value="<?php echo $produto['preco']; ?>">
  </div>

  <div class="form-group" style="width:400px">
    <input type="number" class="form-control" placeholder="Quantidade" name="quantidade" value="<?php echo $produto['quantidade']; ?>">
  </div>

  <div class="form-group" style="width:400px">
    <input type="file" class="form-control" placeholder="Quantidade" name="imagem"> <br>
    
    <img src="http://localhost/php/loja/Assets/images/<?php echo $produto['imagem']; ?>" border = "0" height="100">
  </div>


  
  <button type="submit" class="btn btn-primary">Editar</button>
</form>