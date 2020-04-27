<aside>
    
     <!--DIV DE USUARIO LOGUEADO-->
    <?php if(isset($_SESSION['user_data'])): ?>
        <div class="form-box user-box">
            <p>Panel de control</p>
            <h3 class="user_name">Usuario: <?=$_SESSION['user_data']['nombre']?></h3>
            <div class="panel-btns">
                <button class="data-btn"><a href="userDataForm.php">Mis Datos</a></button>
                <button class="data-btn"><a href="postsDashboard.php">Mis Posts</a></button>
                <button class="post-btn"><a href="createPost.php">Crear Post</a></button>
                <button class="logOut-btn"><a href="controllers/logOut.php">Cerrar Sesión</a></button>
            </div>
        </div>
    <?php endif; ?>

    <div class="popular-posts-box">
        <h2>Posts Populares</h2>
        
        <div class="posts-wrapper">
             <!--LISTAR POSTS POPULARES-->
            <?php if(!empty($popular_posts)): ?>
                <?php foreach($popular_posts as $post): ?>
                <div class="popular-post-content">
                    <h3><?=$post['titulo']?></h3>
                    <div>
                        <time datetime="<?=$post['fecha']?>"><?=$post['fecha']?></time>
                        <div class="img-wrapper">

                        </div>
                    </div>
                    <div class="see-more-wrapper">
                        <a href="postDetails.php?id=<?=$post['id']?>"><button>Leer más</button></a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="forms-wrapper" id="session-box">
             <?php if(!isset($_SESSION['user_data'])): ?>
     
                <div class="form-box">
                    <h4>Inicia Sesión</h4>

                    <?php if(isset($_SESSION['login_error'])): ?>
                     <span class="error"><?=$_SESSION['login_error']?></span>
                    <?php endif; ?>

                    <form action="controllers/login.php" method="POST">
                        <p>
                            <label for="email">Correo</label> <br>
                            <input type="email" name="email" placeholder="ejemplo@email.com" required="required">
                        </p>
                        <p>
                            <label for="password">Contraseña</label> <br>
                            <input type="password" name="password" required="required" minlength="8">
                        </p>
                        <div>
                            <input type="submit" name="submit" value="Ingresar">
                        </div>
                    </form> 
                </div>

                 <hr>

                <div class="form-box">
                    <h4>Registrate</h4>

                    <?php if(isset($_SESSION['error'])): ?>
                        <span class="error"> Ingresa los datos correctamente (<?=$_SESSION['error']?>)</span>
                    <?php endif; ?>

                    <form action="controllers/register.php" method="POST">
                        <p>
                            <label for="name">Nombre</label> <br>
                            <input type="text" name="name" required="required" pattern=".[a-zA-Z ]+">
                        </p>
                        <p>
                            <label for="email">Correo</label> <br>
                            <input type="email" name="email" placeholder="ejemplo@email.com" required="required">
                        </p>
                        <p>
                            <label for="password">Contraseña</label> <br>
                            <input type="password" name="password" required="required" minlength="8">
                         </p>
                         <div>
                            <input type="submit" name="submit" value="Registrarme">
                         </div>
                    </form> 
                </div>

                <?php endif; ?>
        </div>
</aside>
