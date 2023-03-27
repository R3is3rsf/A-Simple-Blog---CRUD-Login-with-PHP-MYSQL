<?php
require_once("includes/redirec.php");
require_once ("includes/conexion.php");
require_once ("includes/helpers.php");

if(isset($_POST['submit'])){
    $id= $_SESSION['usuario']['id'];
    $titulo = isset($_POST['titulo'])? mysqli_escape_string($conexion,$_POST['titulo']):false;
    $descripcion=isset($_POST['descripcion'])? mysqli_escape_string($conexion,$_POST['descripcion']):false;
    $categoria=isset($_POST['categoria'])?mysqli_escape_string($conexion,$_POST['categoria']):false;
    $error=[];

    if(is_numeric($titulo) || empty($titulo)){
        $_SESSION['error_titulo']="Titutlo no valido";
        $error[]=$_SESSION['error_titulo'];
    }
    if(is_numeric($descripcion) || empty($descripcion)){
        $_SESSION['error_descripcion']="Descripcion no valida";
        $error[]=$_SESSION['error_descripcion'];
    }
    if(count($error)==0){
        $select = "SELECT *FROM entradas WHERE titulo='$titulo'";
        $query = mysqli_query($conexion,$select);
        $row = mysqli_fetch_assoc($query);
        if($row==0){
            $insert = "INSERT INTO entradas VALUES(null,$id,$categoria,'$titulo','$descripcion',CURDATE());";
            $query = mysqli_query($conexion,$insert);
            $_SESSION['exito']="Entrada registrada exitosamente";
        }else{
            $_SESSION['warning']="La entrada ya existe";
        }
    }
    header('location:crear_entradas.php');

}

