<?php

require_once '../includes/connection.php';

if(isset($_GET['id'])){ 
    $post_id = $_GET['id'];
    
    //Borrar post
    deletePost($post_id);
}

//redireccion
header('Location:../postsDashboard.php');


function deletePost($id) {
    global $blogDB;
    
    $query = "DELETE FROM posts WHERE id = $id";
    $res = mysqli_query($blogDB, $query);
    
    if($res) {
        $_SESSION['delete_ok'] = 'ok';
    } else {
        $_SESSION['delete_error'] = 'error';
    }
}

?>

