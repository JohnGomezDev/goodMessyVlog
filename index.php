<!--OPEN DE HTML, HEADER Y NAV-->
<?php require_once './includes/header.php'; ?>

<?php
//array con posts por fecha (MAIN)
$posts = getData($blogDB, $postsQuery.' ORDER BY p.fecha DESC LIMIT 3');
?>

<!--MAIN-->
<main>
    <h2>Ultimos Posts</h2>
    <!--MENSAJE DE REGISTRO -->
    <?php if(isset($_SESSION['succes'])): ?>
            <div class="succes"><?=$_SESSION['succes']?>. Inicia sesión para ver que puedes hacer!</div>
    <?php endif; ?>
            
    <!--LISTAR POSTS-->
    <?php if(!empty($posts)): ?>
        <?php foreach($posts as $post): ?>
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
    
    <div class="view-all-box">
        <a href="allPosts.php"><button>Ver todos</button></a>
    </div>
</main>

<!--SIDEBAR-->
<?php require_once './includes/aside.php';?>

<!--FOOTER Y CLOSE DE HTML-->
<?php require_once './includes/footer.php';?>

<?php deleteSessions(); ?>