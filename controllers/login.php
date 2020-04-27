<?php

//LOGIN DE USUARIOS

//sesion y conexiona base de datos
require_once '../includes/connection.php';

//recoger datos del formulario

if(!empty($_POST['submit'])) {

    $email = !empty($_POST['email']) ? mysqli_real_escape_string($blogDB, trim($_POST['email'])) : null;
    $password = !empty($_POST['password']) ? mysqli_real_escape_string($blogDB, $_POST['password']) : null;
    
    $error = 'no_error';
    
    $isAuthenticated = verifyCredentials($email, $password);
    
    $_SESSION['login_error'] = $isAuthenticated;
}


//consulta a base de datos para verificar si existe el usuario
function verifyCredentials($email, $password) {
    global $blogDB, $error;
    
    $verify_query = "SELECT * FROM usuarios WHERE email = '$email'";
    $res = mysqli_fetch_assoc(mysqli_query($blogDB, $verify_query));
    
    if($res) {
    
        //comprobar contraseña
        $authentication = password_verify($password, $res['password']);
        
        if($authentication) {
            
            unset($_SESSION['login_error']); //eliminar la sesion de errores
            //guardar datos usuarios
            saveData($res);
            
        } else {
            $state = 'Contraseña incorrecta';
        }
        
    } else {
        $state = 'Email no registrado';
    }
    
    return $state;
}

//guardar datos de usuario en sesion
function saveData($data) {
    $_SESSION['user_data'] = $data;
}

//redireccion 
header('Location:../index.php');

?>