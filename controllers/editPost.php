<?php

require_once '../includes/connection.php';
require_once '../includes/helpers.php';

if(!empty($_POST['submit'])) {
    
    $title = !empty($_POST['title']) ? mysqli_escape_string($blogDB, $_POST['title']) : null;
    $categorie = !empty($_POST['categorie']) ? (int)$_POST['categorie'] : null;
    $content = !empty($_POST['content']) ? mysqli_escape_string($blogDB, $_POST['content']) : null;
    
    $post_id = $_GET['id'];
    
    $query = "UPDATE posts SET titulo = '$title', categoria_id = $categorie, contenido = '$content' WHERE id = $post_id";
    
    //Editar el post
    handlePosts($query, 'edit_post');
}

//redireccion a dashboard
header('Location:../postsDashboard.php');


?>
