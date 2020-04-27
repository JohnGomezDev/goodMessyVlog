<!--HEADER Y NAV-->
<?php require_once './includes/header.php'; ?>

<?php
//Posts por usuario
$this_user_posts = isset($_SESSION['user_data']) ? getData($blogDB, $postsQuery." WHERE u.id = {$_SESSION['user_data']['id']}") : false;
?>

<?php require_once './includes/redirect.php';?>

<!--SIDEBAR-->
<?php require_once './includes/aside.php';?>

<!--MAIN-->
<main>
    <!--ALERTAS DE EDICION-->
    <?php if(isset($_SESSION['edit_post_ok'])): ?>
            <div class="succes">Post editado correctamente!</div>
    <?php endif; ?>
            
    <?php if(isset($_SESSION['edit_post_error'])): ?>
            <div class="error">Oops! Hubo un error al intentar editar el post</div>
    <?php endif; ?>
            
    <!--ALERTAS DE BORRADO-->
    <?php if(isset($_SESSION['delete_ok'])): ?>
            <div class="succes">Post borrado</div>
    <?php endif; ?>
            
    <?php if(isset($_SESSION['delete_error'])): ?>
            <div class="error">Oops! Hubo un error al intentar borrar el post</div>
    <?php endif; ?>
    
    <h2>Mis posts</h2>
     <!--LISTAR POSTS-->
    <?php if(!empty($this_user_posts)): ?>
        <?php foreach($this_user_posts as $post): ?>
            <article class="post">
                <h1><?=$post['titulo']; ?></h1>
                <div class="post-content">
                    <time datetime="<?=$post['fecha']; ?>"><?=$post['fecha']; ?></time>
                    <span class="categorie-span"><?=$post['categoria']?></span>
                    <p>
                        <?= substr($post['contenido'], 0, 300); ?>...
                    </p>
                    <div class="edit-delete-box">
                        <a class="edit" href="editPostForm.php?id=<?=$post['id']?>"><button>Editar post</button></a>
                        <button class="delete" onclick="confirmDelete('<?=$post['titulo']?>','<?=$post['id']?>')">Eliminar post</button>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
     <div class="no-posts-box">
         No has subido ningún posts, haz clic <a href="createPost.php">AQUÍ</a> para crear uno
     </div>
    <?php endif; ?>
</main>

<script>  
    function confirmDelete(title, id) {
        let res = confirm(`¿Seguro quieres borrar ${title}?`);
        
        if(res) {
            location.href=`controllers/deletePost.php?id=${id}`;
        } 
    }
</script>

<!--FOOTER Y CLOSE DE HTML-->
<?php require_once './includes/footer.php';?>

<?php deleteSessions(); ?>