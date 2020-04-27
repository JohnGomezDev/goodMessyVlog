<!--HEADER Y NAV-->
<?php require_once './includes/header.php';?>

<?php require_once './includes/redirect.php';?>

<!--ASIDE-->
<?php require_once './includes/aside.php';?>

<!--MAIN-->
<main>
    <?php if(isset($_SESSION['edit_ok'])): ?>
            <div class="succes">Datos editados correctamente!</div>
    <?php endif; ?>
            
    <?php if(isset($_SESSION['edit_error'])): ?>
            <div class="error">Oops! Hubo un error al intentar editar los datos</div>
    <?php endif; ?>
            
    <h2 class="form-title">Mis Datos</h2>
    
    <form action="controllers/editUserData.php" method="POST" class="form">
         <p>
            <label for="name">Nombre</label> <br>
            <input type="name" id="name_input" name="name" value="<?=$_SESSION['user_data']['nombre']?>" required="required" class="mar-top" pattern=".[a-zA-Z ]+" disabled="disabled">
            <span id="edit-btn">Editar</span>
            <!--ERROR MESSAGE-->
            <?php if(isset($_SESSION['edit_error']) && $_SESSION['edit_error'] == 'nombre'): ?>
                <div class="edit-error">Ingresa un nombre valido</div>
            <?php endif; ?>
        </p>
        <p>
            <label for="email">Correo</label> <br>
            <input type="email" id="email_input" name="email" value="<?=$_SESSION['user_data']['email']?>" required="required" disabled="disabled">
            <!--ERROR MESSAGES-->
            <?php if(isset($_SESSION['edit_error']) && $_SESSION['edit_error'] == 'email'): ?>
                <div class="edit-error">Ingresa un email valido</div>
            <?php endif; ?>
            <?php if(isset($_SESSION['edit_error']) && $_SESSION['edit_error'] == 'email_repeated'): ?>
                <div class="edit-error">El email ingresado ya esta registrado</div>
            <?php endif; ?>
        </p>
        
        <input type="submit" name="submit" value="Guardar" class="submit-btn">
    </form>
</main>

<!--SCRIP PARA ACTIVAR CAMPOS DE TEXTO-->
<script>
    
    let editBtn = document.getElementById('edit-btn');
    
    let name_input = document.getElementById('name_input');
    let email_input = document.getElementById('email_input');
   
    editBtn.addEventListener('click', () => {
        name_input.disabled = false;
        email_input.disabled = false;
    });
    
</script>

<!--FOOTER-->
<?php require_once './includes/footer.php';?>

<?php deleteSessions(); ?>