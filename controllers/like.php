<?php

require_once '../includes/connection.php';

//Recoger id por get
$id = $_GET['id'];

//DAR LIKE
$query = "UPDATE posts SET puntos = (puntos + 1) WHERE id = $id";
$res = mysqli_query($blogDB, $query);
        
header('Location:' . getenv('HTTP_REFERER')); //volver a pagina anterior
?>

