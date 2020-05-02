<header>
        <div class="topo">
                
        </div>

        <div class="menu-int">
            <nav>
                <ul>
                    <a href=""><li>Home</li></a>
                    <a href=""><li>Empresa</li></a>
                    <?php foreach($viewData['categorias'] as $v): ?>
                    <a href="<?php echo BASE_URL?>categoria/ver/<?php echo $v['id']?>">
                        <li><?php echo $v['titulo'] ;?></li>
                    </a>
                    <?php endforeach; ?>
                    <a href=""><li>Contato</li></a>
                </ul>
            </nav>
        </div>
         
    </header>