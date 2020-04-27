<!--OPEN DE HTML, HEADER Y NAV-->
<?php require_once './includes/header.php'; ?>

<!--VERIFICAR SI EXISTE EL ID-->
<?php

    //Conseguir post especifico
    $specific_post = isset($_GET['id']) ? getData($blogDB, $postsQuery." WHERE p.id = {$_GET['id']}") : false;

    if(empty($specific_post[0]['id'])) {
        header('Location:index.php');
    }

?>

<!--MAIN-->
<main>
    <h2>Lée: <?=$specific_post[0]['titulo']; ?></h2>
    <article class="post">
        <h1><?=$specific_post[0]['titulo']; ?></h1>
        <div class="post-content">
            <time datetime="<?=$specific_post[0]['fecha']; ?>"><?=$specific_post[0]['fecha']; ?></time>
            <span class="uploaded-by">Subido por: <?=$specific_post[0]['usuario']?></span>
            <span class="categorie-span"><?=$specific_post[0]['categoria']?></span>
            <p>
                <?=$specific_post[0]['contenido']; ?>
            </p>
            <div class="like-box">
                <div>
                    <span class="points"><?=$specific_post[0]['puntos']?></span>
                    <a class="like-btn" href="controllers/like.php?id=<?=$specific_post[0]['id']?>">❤ +</a>
                </div>
            </div>
        </div>
    </article>
</main>

<!--SIDEBAR-->
<?php require_once './includes/aside.php';?>

<!--FOOTER Y CLOSE DE HTML-->
<?php require_once './includes/footer.php';?>

