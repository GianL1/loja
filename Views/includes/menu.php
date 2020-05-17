<header>
        <div class="topo">
                
        </div>

        <div class="menu-int">
            <nav>
                <ul>
                    <a href="<?php echo BASE_URL; ?>pedidos">Pedidos</a>
                    <a href="<?php echo  BASE_URL ?>login/logar">Login</a>
                    <a href="<?php echo BASE_URL; ?>"><li>Home</li></a>
                    <a href="<?php echo BASE_URL; ?>empresa"><li>Empresa</li></a>
                    <?php foreach($viewData['categorias'] as $v): ?>
                    <a href="<?php echo BASE_URL?>categoria/ver/<?php echo $v['id']?>">
                        <li><?php echo $v['titulo'] ;?></li>
                    </a>
                    <?php endforeach; ?>
                    <a href="<?php echo BASE_URL?>contato"><li>Contato</li></a>
                </ul>
                <a href="<?php echo BASE_URL?>carrinho">
                    <div class="carrinho">
                        Carrinho: <br>
                        <?php echo isset($_SESSION['carrinho']) ? count($_SESSION['carrinho']) : '0' ; ?> itens
                    </div>
                </a>
            </nav>
        </div>
         
    </header>