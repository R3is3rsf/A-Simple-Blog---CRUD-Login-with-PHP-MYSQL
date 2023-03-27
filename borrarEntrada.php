<?php
require_once('includes/redirec.php');
require_once('includes/conexion.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $delete = "DELETE FROM entradas WHERE id=$id";
    $query= mysqli_query($conexion,$delete);

    header('location:index.php');

}