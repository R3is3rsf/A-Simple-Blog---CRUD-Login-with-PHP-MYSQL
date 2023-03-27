<?php
require_once('includes/redirec.php');
require_once('includes/conexion.php');
require_once('includes/helpers.php');
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $nombre = (isset($_POST['nombre']))? mysqli_escape_string($conexion,$_POST['nombre']):false;
    $apellidos=(isset($_POST['apellido']))? mysqli_escape_string($conexion,$_POST['apellido']):false;
    $email=(isset($_POST['email']))? mysqli_escape_string($conexion,$_POST['email']):false;
    $password=(isset($_POST['password']))? mysqli_escape_string($conexion,$_POST['password']):false;

    $error=[];
    if(is_numeric($nombre) || empty($nombre)){
        $error['nombre']='Nombre invalido';
    }  
    if(is_numeric($apellidos) || empty($apellidos)){
        $error['apellido']='Apellido invalido';
    } 
    if(!filter_var($email,FILTER_VALIDATE_EMAIL) || empty($email)){
        $error['email']='Email invalido';
    }
    if(($email!=$_SESSION['usuario']['email']) &&   !comprobarEmail($conexion,$_SESSION['usuario']['email'])){
        $error['email']="Ese email ya esta en uso";
    } 
    if(empty($password)){
        $error['password']='Password invalido';
    } 
    if(count($error)==0){
        //$password_encrip=password_hash($password,PASSWORD_BCRYPT,['cost'=>4]);

        $update="UPDATE usuarios SET 
        nombre='$nombre',apellidos='$apellidos',email='$email'
        WHERE id=$id;";
        $query= mysqli_query($conexion,$update);
        $_SESSION['usuario']['nombre']=$nombre;
        $_SESSION['usuario']['apellido']=$apellidos;
        $_SESSION['usuario']['email']=$email;

        $_SESSION['exito']="Se actualizaron las datos correctamente";
    }else{
        $_SESSION['error']=$error;
    }  

    header('location: update.php');

}