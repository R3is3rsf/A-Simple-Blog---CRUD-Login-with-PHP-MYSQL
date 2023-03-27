<?php
require_once("includes/conexion.php");

if(isset($_POST['submit'])){

    $email = isset($_POST['email'])? mysqli_real_escape_string($conexion,$_POST['email']) : false;
    $password = isset($_POST['password'])? mysqli_real_escape_string($conexion,$_POST['password']): false;
    $errores=[];

    if(empty($email) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            $errores['correo']="Correo invalido";
    }
    if(empty($password)){
        $errores['password']="La clave no puede ir vacia";
    }

    if(count($errores)==0){


         $select = "SELECT *FROM
                 usuarios 
                 where email='$email' 
                 
             ";

         $query= mysqli_query($conexion,$select);   
         $row = mysqli_fetch_array($query);
         if(password_verify($password,$row['password'])){
            $_SESSION['usuario']=$row;
            header('location: index.php');
         }else{
            $errores['password']="Clave incorrecta";
            $_SESSION['errors_login']=$errores;
            header('location: index.php');
         }
    }else{
        $_SESSION['errors_login']=$errores;
        header('location: index.php');
    }

}