<!--HEADER Y NAV-->
<?php require_once './includes/header.php'; ?>

<?php
//Conseguir post especifico
$specific_post = isset($_GET['id']) ? getData($blogDB, $postsQuery." WHERE p.id = {$_GET['id']}") : false;
?>

<?php require_once './includes/redirect.php';?>

<!--SIDEBAR-->
<?php require_once './includes/aside.php';?>

<!--MAIN-->
<main>
    
    <?php if(!empty($specific_post) && $_SESSION['user_data']['id'] == $specific_post[0]['usuario_id']): ?>      
    <h2 class="form-title">Editar post</h2>
    <form action="controllers/editPost.php?id=<?=$specific_post[0]['id']?>" method="POST" class="form">
        <p>
            <label for="title">Titulo</label> <br>
            <input type="text" value="<?=$specific_post[0]['titulo']?>" name="title" required="required" class="mar-top">
        </p>
        <p>
            <label for="categorie">Categoría</label> <br>
            <select name="categorie" required="required" class="mar-top">
                <?php if(!empty($categories)): ?>
                    <?php foreach ($categories as $categorie): ?>
                        <option value="<?=$categorie['id']?>"><?=$categorie['nombre']?></option>
                    <?php endforeach;?>
                <?php endif;?>
            </select>
        </p>
        <p>
            <label for="content">Contenido</label> <br>
            <textarea name="content" required="required" minlength="200" class="mar-top"><?=$specific_post[0]['contenido']?></textarea>
        </p>
        <input type="submit" name="submit" value="Guardar Cambios" class="submit-btn">
    </form>
    <?php else: ?>
    <div class="no-posts-box">
        El post no existe
    </div>
    <?php endif; ?>
</main>

<!--FOOTER Y CLOSE DE HTML-->
<?php require_once './includes/footer.php';?>
