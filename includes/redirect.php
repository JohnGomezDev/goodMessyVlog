<?php

//Redireccion para paginas que necesitan estar logueado
if(!isset($_SESSION['user_data'])) {
    header('Location:index.php');
}
 

?>