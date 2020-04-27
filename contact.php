<!--HEADER Y NAV-->
<?php require_once './includes/header.php'; ?>

<!--SIDEBAR-->
<?php require_once './includes/aside.php';?>

<!--MAIN-->
<main>
    
    <?php if(isset($_SESSION['mail_ok'])): ?>
        <div class="succes">
            Tu mensaje ha sido enviado! Nos comunicaremos contigo lo mas pronto posible
        </div>
    <?php endif; ?>
            
    <?php if(isset($_SESSION['mail_error'])): ?>
            <div class="error">Oops! Hubo un error al intentar enviar el mensaje</div>
    <?php endif; ?>
    <h2>Contácta con nosotros</h2>
    <form action="controllers/sendMail.php" method="POST" class="form">
        <p>
            <label for="name">Nombre</label> <br>
            <input type="text" name="name" required="required" class="mar-top" pattern=".[a-zA-Z ]+">
        </p>
        <p>
            <label for="email">Correo</label> <br>
            <input type="email" name="email" required="required" placeholder="ejemplo@email.com">
        </p>
        <p>
            <label for="reason">Razón del contacto</label> <br>
            <select name="reason">
                <option value="post">Problemas con posts</option>
                <option value="account">Problemas con cuenta</option>
                <option value="report">Reportar mal uso</option>
                <option value="other">Otro</option>
            </select>
        </p>
        <p>
            <label for="message">Mensaje</label> <br>
            <textarea name="message" required="required" class="mar-top"></textarea>
        </p>
        <input type="submit" name="submit" value="Enviar" class="submit-btn">
    </form>
</main>

<!--FOOTER Y CLOSE DE HTML-->
<?php require_once './includes/footer.php';?>

<?php deleteSessions(); ?>

