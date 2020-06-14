

<h1>Produtos - Adicionar</h1>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group" style="width:400px">
    <input type="text" class="form-control" placeholder="Nome do Produto" name="produto">
  </div>

  <div class="form-group" style="width:400px">
    <input type="text" class="form-control" placeholder="Descrição" name="descricao">
  </div>

  <select name="categoria">
    <?php foreach ($categorias as $categoria): ?>
        <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['titulo']; ?></option>
    <?php endforeach; ?>
  </select><br><br>

  <div class="form-group" style="width:400px">
    <input type="number" class="form-control" placeholder="Preço" name="preco">
  </div>

  <div class="form-group" style="width:400px">
    <input type="number" class="form-control" placeholder="Quantidade" name="quantidade">
  </div>

  <div class="form-group" style="width:400px">
    <input type="file" class="form-control" placeholder="Quantidade" name="imagem">
  </div>


  
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>