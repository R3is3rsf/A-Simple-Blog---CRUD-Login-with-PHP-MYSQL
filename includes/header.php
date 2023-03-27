<?php require_once("conexion.php") ?>
<?php require_once("helpers.php")  ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Simple Blog - CRUD/Login with PHP/MYSQL</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <!--Cabecera -->
    <header id="cabecera">
        <!--Logo -->
        <div id="logo">
            <a href="index.php">
            A Simple Blog - CRUD/Login with PHP/MYSQL
            </a>
        </div>
        <!--Menu -->
        <nav id="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <?php $categorias=listCategorias($conexion)  ?>
                <?php  foreach($categorias as $categoria):?>
                <li><a href="categoria.php?id=<?=$categoria['id']  ?>"><?= $categoria['nombre']; ?></a></li>
                <?php endforeach;  ?>
                <li><a href="index.php">Sobre nosotros</a></li>
                <li><a href="index.php">Contacto</a></li>

            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
    
    <div id="contenedor">
