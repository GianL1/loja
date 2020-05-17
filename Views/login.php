<h1>Pagina de login</h1>

<?php if (!empty($erro)): ?>
    <div style="background-color: red;color: #ffffff;padding: 15px">
        <?php echo $erro;?>
    </div>
<?php endif; ?>

<form action="" method="post">

    <label for="">
        <input type="email" name="email">
    </label><br><br>

    <label for="">
        <input type="password" name="senha"><br><br>
    </label><br><br>

    <button type="submit">Enviar</button>

</form>