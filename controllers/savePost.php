<?php

require_once '../includes/connection.php';
require_once '../includes/helpers.php';

if(!empty($_POST['submit'])) {
    
    $title = !empty($_POST['title']) ? mysqli_escape_string($blogDB, $_POST['title']) : null;
    $categorie = !empty($_POST['categorie']) ? (int)$_POST['categorie'] : null;
    $content = !empty($_POST['content']) ? mysqli_escape_string($blogDB, $_POST['content']) : null;
    
    $user_id = $_SESSION['user_data']['id'];
    
    $query = "INSERT INTO posts VALUES(NULL, $user_id, $categorie, '$title', '$content', CURDATE(), 0)";
    
    //Guardar post
    handlePosts($query, 'post');
  
}

//Redireccion 
header('Location:../createPost.php');

?>