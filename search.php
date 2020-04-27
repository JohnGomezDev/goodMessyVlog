<!--HEADER Y NAV-->
<?php require_once './includes/header.php'; ?>

<?php
    if(isset($_GET['search'])){
        $key = $_GET['search'];
        $found_posts = getData($blogDB, $postsQuery. " WHERE p.titulo LIKE '%$key%' OR c.nombre LIKE '%$key%' OR u.nombre LIKE '%$key%'");
    }
?>

<!--SIDEBAR-->
<?php require_once './includes/aside.php';?>

<!--MAIN-->
<main>
    <h2>Resultados de la Busqueda: <span class="key_word"><?=$key?></span></h2>
    <!--LISTAR POSTS-->
    <?php if(!empty($found_posts)): ?>
        <?php foreach($found_posts as $post): ?>
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
                            <a href="like.php?id=<?=$post['id']?>" class="like-btn">❤ +</a>
                        </div>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
    <div class="no-posts-box">
        No hay posts con coincidan con la busqueda
    </div>
    <?php endif; ?>
</main>

<!--FOOTER Y CLOSE DE HTML-->
<?php require_once './includes/footer.php';?>