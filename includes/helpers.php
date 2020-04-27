<?php

// Borrar sesiones al recargar la pagina
function deleteSessions() {
    unset($_SESSION['error']);
    unset($_SESSION['succes']);
    unset($_SESSION['login_error']);
    unset($_SESSION['post_ok']);
    unset($_SESSION['post_error']);
    unset($_SESSION['edit_ok']);
    unset($_SESSION['edit_error']);
    unset($_SESSION['delete_ok']);
    unset($_SESSION['delete_error']);
    unset($_SESSION['edit_post_ok']);
    unset($_SESSION['edit_post_error']);    
    unset($_SESSION['mail_ok']);
    unset($_SESSION['mail_error']);
}


// sacar categorias y posts de la base de datos
function getData($db, $query) {
    $res = mysqli_query($db, $query);
    
    $res_array = [];
    
    if($res && mysqli_num_rows($res) >= 1) {
        
        while ($row = mysqli_fetch_assoc($res)) {
            array_push($res_array, $row);
        }
    }
    // Si no hay una respuesta me devuelve un array vacio
    return $res_array; 
}

//array con categorias
$categories = getData($blogDB, 'SELECT * FROM categorias');

//Query para buscar posts
$postsQuery = 'SELECT u.nombre AS "usuario", c.nombre AS "categoria", p.* FROM posts p INNER JOIN usuarios u ON u.id = p.usuario_id INNER JOIN categorias c ON c.id = p.categoria_id';

//array para posts mas populares ASIDE)
$popular_posts = getData($blogDB, 'SELECT * FROM posts ORDER BY puntos DESC LIMIT 2');


//guardar y editar posts
function handlePosts($query, $session) {
    global $blogDB;
    
    $res = mysqli_query($blogDB, $query);
    
    if($res) {
        $_SESSION[$session.'_ok'] = 'ok';
    } else {
        $_SESSION[$session.'_error'] = 'error';
    }
}


?>

