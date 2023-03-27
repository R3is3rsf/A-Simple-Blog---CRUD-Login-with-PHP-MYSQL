<?php

$host='localhost';
$user='root';
$password='123456';
$db='blog';

$conexion=mysqli_connect($host,$user,$password,$db);

//setear valores de la base de dato
mysqli_query($conexion,"SET NAMES 'utf8'");

if(!isset($_SESSION)){

    session_start();
}