<?php

//CONECCION A BASE DE DATOS
$server = 'localhost';
$db_user = 'root';
$dbName = 'blog_db';
$blogDB = mysqli_connect($server, $db_user, '', $dbName);

//if(mysqli_errno($blogDB)) {
//    echo 'Hubo un error';
//} else {
//    echo 'coneccion correcta!!';
//}

//SETEAR CARARTERES
mysqli_query($blogDB, 'SET NAMES "utf8"');



//INICIAR SESION 
session_start();


?>