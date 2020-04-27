
<!--CONEXION A LA BASE DE DATOS-->
<?php require_once 'connection.php'; ?>

<!--HELPERS-->
<?php require_once 'helpers.php'; ?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Blog de profesiones y vida cotidiana de profesionales">
        <meta name="keywords" content="blog, tecnologia, amor, vida, web, programacion, css, html, javascript">
        <title>GoodMessy - Tu blog cotidiano</title>
        
        <link rel="stylesheet" type="text/css" href="./styles/styles.css">
        <link rel="stylesheet" href="./assets/icomoon/style.css">
        <link rel="stylesheet" type="text/css" href="./styles/forms.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700&display=swap" rel="stylesheet">
    </head>
    <body>
    <div id="container">
        <!--HEADER-->
        <header>
            <div class="logo">

            </div>
            <div class="search-box">
                <form name="submit" action="search.php" method="GET">
                    <input type="text" name="search" placeholder="Busca algo..." required="required">
                    <input type="submit" value="Buscar">
                </form>
                <button id="toggleNavBtn">Menu</button>
            </div>
        </header>
        <!--NAVBAR-->
        <nav id="nav">
            <ul>     
                <li><a class="nav-item" href="index.php">Inicio</a></li>
                
                <?php if(!empty($categories)): ?>
                    <?php foreach ($categories as $categorie): ?>
                        <li><a class="nav-item" href="categories.php?id=<?=$categorie['id']?>"><?=$categorie['nombre']?></a></li>
                    <?php endforeach;?>
                <?php endif;?>
                    
                <li><a class="nav-item" href="about.php">Sobre nosotros</a></li>
                <li><a class="nav-item" href="contact.php">Contacto</a></li>
                
                <li class="session-btn"><a class="nav-item">Iniciar Sesion</a></li>
                <li class="session-btn"><a class="nav-item">Registrarme</a></li>
            </ul>
        </nav>