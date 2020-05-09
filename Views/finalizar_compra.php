<h1>Finalizar Compra</h1>

<?php if (!empty($erro)): ?>
    <div class="erro">
        <?php echo $erro; ?>
    </div>
<?php endif; ?>

<form action="" method="post">
    <fieldset>
        <legend>Informações do Usuário</legend>
        <label>
            Nome: <br>
            <input type="text" name="nome" id="">
        </label> <br><br>

        <label>
            Email: <br>
            <input type="text" name="email" id="">
        </label><br><br>

        <label>
            Senha: <br>
            <input type="password" name="senha" id="">
        </label><br><br>
        
    </fieldset>

    <fieldset>
        <legend>Informações de Endereço</legend>
        <textarea name="endereco"></textarea>
    </fieldset>

    <fieldset>
        <legend>Resumo da compra: </legend>
        Total a Pagar: <?php echo $total; ?>
    </fieldset>

    <fieldset>
        <legend>Informações de Pagamento</legend>
        <?php foreach($pagamento as $pg): ?>
            <input type="radio" name="pg" value="<?php echo $pg['id']; ?>"> <?php echo $pg['nome']; ?><br><br>
        <?php endforeach; ?>
    </fieldset>
    <br>
    <button type="submit">Efetuar Pagamento</button>
</form>

