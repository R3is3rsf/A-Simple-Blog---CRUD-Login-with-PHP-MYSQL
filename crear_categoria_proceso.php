<?php
require_once("includes/redirec.php");
require_once("includes/conexion.php");
    if(isset($_POST['submit'])){
        $categoria = isset($_POST['categoria'])? mysqli_real_escape_string($conexion,$_POST['categoria']):false;
        $mensaje='';
        
        if(!is_numeric($categoria) && !empty($categoria)){

            $select="SELECT *FROM categorias WHERE nombre='$categoria'";
            $query=mysqli_query($conexion,$select);
            $row = mysqli_fetch_assoc($query);
            if($row==0){
                $insert = "INSERT INTO categorias VALUES (null,'$categoria');";
                $query = mysqli_query($conexion,$insert);
                $mensaje=$_SESSION['exito']="Categoria registrada exitosamente";    
            }else{
                $mensaje=$_SESSION['error']="La categoria ya existe";
  
            }
        }

        else{
            $mensaje=$_SESSION['error']="Valor no valido";
        }

    }

    header('location: crear_categoria.php');
?>