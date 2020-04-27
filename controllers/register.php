<?php

require_once '../includes/connection.php';

//REGISTRO DE NUEVOS USUARIOS

//recoger datos de formulario
$error = '';

if(!empty($_POST['submit'])) {
    
    $name = !empty($_POST['name']) ? mysqli_real_escape_string($blogDB, $_POST['name']) : null;
    $email = !empty($_POST['email']) ? mysqli_real_escape_string($blogDB, $_POST['email']) : null;
    $password = !empty($_POST['password']) ? mysqli_real_escape_string($blogDB, $_POST['password']) : null;
    
    $error = 'no_error';
    
    // validar antes de guardar en base de datos
    if(!$name || preg_match('/[0-9]/', $name)) {
        $error = 'nombre'; 
    }
    
    if(!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'email'; 
    }
    
    if(!$password) {
        $error = 'contraseña';
    }
    
    // Guardar en base de datos
    saveUserInDB($name, $email, $password);
    
} else {
    $error = 'no_data_found'; 
}


header('Location:../index.php'); //Redireccion al terminar todo el proceso


// FUNCION PARA GUARDAR EN LA BASE DE DATOS
function saveUserInDB($name, $email, $password) {
    
    global $blogDB;
    global $error;
    
    if($error == 'no_error') {
        //cifrar contraseña
        $crypted_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        
        //guardar en DB
        $insert_query = "INSERT INTO usuarios VALUES(NULL, '$name', '$email', '$crypted_password', CURDATE())";
        $save = mysqli_query($blogDB, $insert_query);
        
        if(mysqli_errno($blogDB)) {
            $error = 'Internal error';            
            $_SESSION['error'] = $error;
            
        } else {
            
            //quitar sesion para elimiar los errores
            unset($_SESSION['error']);
            
            $_SESSION['succes'] = 'Usuario registrado correctamente';      
        }
        
    } else {
        
        //guardar error en la sesion
        $_SESSION['error'] = $error;
        
    }
}

?>