<?php
require_once('includes/redirec.php');
if(isset($_POST['submit'])){
    require_once('includes/conexion.php');
    $id = isset($_POST['id'])? mysqli_real_escape_string($conexion,$_POST['id']) : false;
    $titulo = isset($_POST['titulo'])? mysqli_real_escape_string($conexion,$_POST['titulo']): false;
    $descripcion = isset($_POST['descripcion'])? mysqli_real_escape_string($conexion,$_POST['descripcion']): false;
    $categoria = isset($_POST['categoria'])? mysqli_real_escape_string($conexion,$_POST['categoria']): false;
    $mensaje="";

 

    if(!empty($id) && !empty($titulo) && !empty($descripcion) && !empty($categoria)){


        $update = "UPDATE entradas SET 
                     usuario_id={$_SESSION['usuario']['id']},
                     categoria_id=$categoria,
                     titulo='$titulo',
                     descripcion='$descripcion'
                  WHERE id=$id;    
                 ";

        $query= mysqli_query($conexion,$update);

        $mensaje="Datos actualizados correctamente";
        $_SESSION['exito'];
    }else{
        $mensaje="Error al actualizar";
        $_SESSION['error'];
    }
   header('location:entrada.php?id='.$id);

}

