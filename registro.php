<?php 
if(isset($_POST['submit'])){

    require_once("includes/conexion.php");
    $nombre=isset($_POST['nombre']) ? mysqli_real_escape_string($conexion,$_POST['nombre']): false;
    $apellido=isset($_POST['apellido']) ?  mysqli_real_escape_string($conexion,$_POST['apellido']): false;
    $email=isset($_POST['email']) ?  mysqli_real_escape_string($conexion,$_POST['email']): false;
    $password=isset($_POST['password']) ?  mysqli_real_escape_string($conexion,$_POST['password']): false;
    $fecha= date('Y-m-d');

//Errores
$errores=[];    
//validar
if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
    $nombre_validado=true;
}else{
    $nombre_validado=false;
    $errores['nombre']="El nombre $nombre no es valido";
}

if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/",$apellido)){
    $apellido_validado=true;
}else{
    $apellido_validado=false;
    $errores['apellido']="El apellido $apellido no es valido";
}

if(!empty($email) &&  filter_var($email,FILTER_VALIDATE_EMAIL)){
    $email_validado=true;
}else{
    $email_validado=false;
    $errores['email']="El email $email no es valido";
}

if(!empty($password) ){
    $password_valida=true;
}else{
    $password_valida=false;
    $errores['password']="La contrasena esta vacia";
}

if(count($errores)!=0){

    $_SESSION['errors']=$errores;
    header("Location: index.php");
}else{
        //Cifrado de contrasena
        $password_segura=password_hash($password,PASSWORD_BCRYPT,['cost'=>4]);
    
        /*
        password_verify($password,$password_segura);
        //Verifica si es el mismo password
        */
 
        $insert="INSERT INTO usuarios VALUES(
            null,
            '$nombre',
            '$apellido',
            '$email',
            '$password_segura',
            CURDATE()
        );";
    
    $query = mysqli_query($conexion,$insert);
    //Agregar enviar correo
    if($query){
        $_SESSION['completado']="Registro exitoso";
    }else{
        $_SESSION['errors']['general']="Fallo al insertar datos";
    }
}
}
header("Location: index.php");



