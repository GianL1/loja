<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/template.css">
    <title>Loja Virtual 2.0</title>
</head>
<body>

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

    <section class="container">
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    </section>
    
    <footer>

    </footer>
</body>
</html>