<?php require_once './includes/connection.php';?>
<?php require_once './includes/helpers.php';?>

<!--VERIFICAR SI EXISTE EL ID-->
<?php

    //Conseguir posts por categorias
    $posts_by_categorie = isset($_GET['id']) ? getData($blogDB, $postsQuery." WHERE p.categoria_id = {$_GET['id']} ORDER BY p.puntos DESC") : false;
    //conseguir nombre de una categoria
    $categorieName = isset($_GET['id']) ? getData($blogDB, "SELECT * FROM categorias WHERE id = {$_GET['id']}") : false;

    if(!isset($categorieName[0]['id'])) {
        header('Location:index.php');
    }

?>


<!--HEADER Y NAV-->
<?php require_once './includes/header.php'; ?>


<!--SIDEBAR-->
<?php require_once './includes/aside.php';?>

<!--MAIN-->
<main>
    
    <h2><?=$categorieName[0]['nombre']?></h2>
     <!--LISTAR POSTS-->
    <?php if(!empty($posts_by_categorie)): ?>
        <?php foreach($posts_by_categorie as $post): ?>
            <article class="post">
                <h1><?=$post['titulo']; ?></h1>
                <div class="post-content">
                    <time datetime="<?=$post['fecha']; ?>"><?=$post['fecha']; ?></time>
                    <span class="uploaded-by">Subido por: <?=$post['usuario']?></span>
                    <span class="categorie-span"><?=$post['categoria']?></span>
                    <p>
                        <?= substr($post['contenido'], 0, 500); ?>...
                    </p>
                    <div class="like-box">
                        <a href="postDetails.php?id=<?=$post['id']?>"><button>Leer más</button></a>
                        <div>
                            <span class="points"><?=$post['puntos']?></span>
                            <a href="controllers/like.php?id=<?=$post['id']?>" class="like-btn">❤ +</a>
                        </div>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
     <div class="no-posts-box">
         <p>No hay posts en esta categoría</p>
     </div>
    <?php endif; ?>
    
</main>

<!--FOOTER Y CLOSE DE HTML-->
<?php require_once './includes/footer.php';?>

