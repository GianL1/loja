
<?php if (!empty($erro)): ?>
        <div class="text-center" style="background-color: red;color: #ffffff;padding: 15px">
            <?php echo $erro;?>
        </div>
<?php endif; ?>

<div class="text-center">


    <form action="" method="post" class="form-signin">
        <h1 class="h3 mb-3 font-weight-normal"> 🦍 Tela de Login 🐒</h1>
        <label for="inputEmail" class="sr-only">Usuário</label>
        <input type="text" class="form-control" placeholder="Usuário" required="" autofocus="" name="usuario">

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" class="form-control" placeholder="Password" required="" name="senha">

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</div>