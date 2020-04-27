<!--HEADER Y NAV-->
<?php require_once './includes/header.php'; ?>

<?php
$allPosts = getData($blogDB, $postsQuery.' ORDER BY p.fecha DESC');
?>

<!--SIDEBAR-->
<?php require_once './includes/aside.php';?>

<!--MAIN-->
<main>
    <h2>Todos los posts</h2>
    <!--LISTAR POSTS-->
    <?php if(!empty($allPosts)): ?>
        <?php foreach($allPosts as $post): ?>
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
    <?php endif; ?>
</main>

<!--FOOTER Y CLOSE DE HTML-->
<?php require_once './includes/footer.php';?>



