

    <h1>Contato</h1>

    <form action="" method="post" class="contato">

    <?php if(!empty($flash_message)): ?>
        <div class="aviso">
            <?php echo $flash_message; ?>
        </div>
    <?php endif; ?><br><br>

    
        <label>
            Nome: <br>
            <input type="text" name="nome" required><br><br>

            Email: <br>
            <input type="email" name="emai" required><br><br>

            Mensagem: <br>
            <textarea name="mensagem" id="" cols="30" rows="10"></textarea><br><br>

            <button type="submit">Enviar Mensagem</button>
        </label>
    </form>