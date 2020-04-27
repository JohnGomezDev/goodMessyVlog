<?php

require_once '../includes/connection.php';

if(!empty($_POST['submit'])) {
    
    $name = !empty($_POST['name']) ? mysqli_real_escape_string($blogDB, $_POST['name']) : null;
    $email = !empty($_POST['email']) ? mysqli_real_escape_string($blogDB, $_POST['email']) : null;
        
    $error = 'no_error';
    
    // validar antes de editar en base de datos
    if(!$name || preg_match('/[0-9]/', $name)) {
        $error = 'nombre'; 
    }
    
    if(!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'email'; 
    }
    
    editData($name, $email);
    
} else {
    $error = 'no_data_found';
}

//Redireccion 
header('Location:../userDataForm.php');

function editData($newName, $newEmail) {
    global $blogDB, $error;
    
    if($error == 'no_error') {
        $id = $_SESSION['user_data']['id'];
        
        $isEmailUnique = verifyExistingEmail($blogDB, $newEmail, $id);
        
        //Verificar si el email ingresado es de algun otro usuario
        if($isEmailUnique) {
            $query = "UPDATE usuarios SET nombre = '$newName', email = '$newEmail' WHERE id = $id";
            $res = mysqli_query($blogDB, $query);

            if($res) {
                unset($_SESSION['edit_error']);
                $_SESSION['edit_ok'] = 'ok';

                //Obtener los datos ya editados 
                getNewData($id, $blogDB);

            } else {
                $error = 'Hubo un error al intentar editar los datos';
                $_SESSION['edit_error'] = $error;
            }
            
        } else {
            $_SESSION['edit_error'] = 'email_repeated';
        }
        
    } else {
        $_SESSION['edit_error'] = $error;
    }
}


function verifyExistingEmail($db, $email, $id) {
    $query = "SELECT id FROM usuarios WHERE email = '$email'";
    $res = mysqli_fetch_assoc(mysqli_query($db, $query));
    
    $valid = $res['id'] == $id || empty($res) ? true : false;
    
    return $valid;
}


function getNewData($id, $db) {
    $query = "SELECT * FROM usuarios WHERE id = $id";
    $res = mysqli_fetch_assoc(mysqli_query($db, $query));
    
    $_SESSION['user_data'] = $res;
}

?>

