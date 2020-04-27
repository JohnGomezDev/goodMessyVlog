<!--HEADER Y NAV-->
<?php require_once './includes/header.php'; ?>

<?php require_once './includes/redirect.php';?>

<!--SIDEBAR-->
<?php require_once './includes/aside.php';?>


<!--MAIN-->
<main>
    <?php if(isset($_SESSION['post_ok'])): ?>
            <div class="succes">Post creado correctamente!</div>
    <?php endif; ?>
            
    <?php if(isset($_SESSION['post_error'])): ?>
            <div class="error">Oops! Hubo un error al intentar crear el post</div>
    <?php endif; ?>
            
    <h2 class="form-title">Crear post nuevo</h2>
    <form action="controllers/savePost.php" method="POST" class="form">
        <p>
            <label for="title">Titulo</label> <br>
            <input type="text" name="title" required="required" class="mar-top">
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
            <textarea name="content" required="required" minlength="200" class="mar-top"></textarea>
        </p>
        <input type="submit" name="submit" value="Crear Post" class="submit-btn">
    </form>
</main>

<!--FOOTER-->
<?php require_once './includes/footer.php';?>

<?php deleteSessions(); ?>
