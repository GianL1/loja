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
                    <a href=""><li>Contato</li></a>
                </ul>
            </nav>
        </div>
         
    </header>

    <section class="container">
        <?php echo $this->loadViewInTemplate($viewName, $viewData=array()); ?>
    </section>
    
    <footer>

    </footer>
</body>
</html>