<?php

function validadError($errores,$campo){
    $alerta='';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta alerta-error'>$errores[$campo]</div>";
    }

    return $alerta;


}

function cleanError(){

   $clean = false; 
   if(isset($_SESSION['warning'])){
        $clean =$_SESSION['warning']= null;
        return $clean; 
    }
   if(isset($_SESSION['error_titulo'])){
        $clean =$_SESSION['error_titulo']= null;
        return $clean; 
    }
   if(isset($_SESSION['error_descripcion'])){
        $clean =$_SESSION['error_descripcion']= null;
        return $clean; 
    
    }
   if(isset($_SESSION['error'])){
       $clean =$_SESSION['error']= null;
       return $clean; 
    }
   if(isset($_SESSION['exito'])){
       $clean =$_SESSION['exito']= null;
       return $clean; 
    }
   if(isset($_SESSION['errors_login'])){
       $clean =$_SESSION['errors_login']= null;
       return $clean; 
    }
   if(isset($_SESSION['errors'])){
       $clean =$_SESSION['errors']= null;
       return $clean; 
    }
   if(isset($_SESSION['completado'])){
    $clean = $_SESSION['completado'] = null;
    return $clean; 
   }

}

function listCategorias($conexion){
    $sql = "SELECT *FROM categorias";
    $query = mysqli_query($conexion,$sql);

    return $query;    
    
}

function listEntradas($conexion,$limit=null,$data=null,$search=null){
    $sql = "select
            CONCAT(u.nombre,' ',u.apellidos) AS 'nombrecompleto',
            e.id as identrada,e.*, c.* from entradas e
            INNER JOIN categorias c
            ON e.categoria_id=c.id
            INNER JOIN usuarios u
            ON u.id=e.usuario_id
             ";

    if($search){
        $sql.=" WHERE e.titulo LIKE '%$search%' ";
    }         

    if($data){
        $sql.=" WHERE c.id=$data ";
    }  
    $sql.=" ORDER BY e.id ";       
    if($limit){
        $sql.=" LIMIT 4";
    }   


    $query = mysqli_query($conexion,$sql);
    
    return $query;      
}



function userId($conexion,$id){
    $select= "SELECT *FROM usuarios WHERE id=$id;";
    $query=mysqli_query($conexion,$select);
    $row=mysqli_fetch_array($query);
    return $row;
}

function entradaId($conexion,$id,$data){
    if(!empty($id)){
        $select= "select CONCAT(u.nombre,' ',u.apellidos)
         AS 'nombrecompleto',e.id as identrada,e.*, c.* 
        from entradas e
        INNER JOIN categorias c
        ON e.categoria_id=c.id 
        INNER JOIN usuarios u
        ON  u.id=e.usuario_id
         ";
        if($data){
            $select.="WHERE c.id=$id";
        }else{
            $select.="WHERE e.id=$id";
        } 
        $query = mysqli_query($conexion,$select);
        $row = mysqli_fetch_array($query);
        if($row==0){
            $_SESSION['error']="La entrada o categoria no existe";
        }else{
            return $row;
        }
    }
}

function comprobarEmail($conexion,$email){

    if(!empty($conexion)){
        $select = "SELECT *FROM usuarios WHERE email='$email'";
        $query = mysqli_query($conexion,$select);
        $row  = mysqli_fetch_array($query);
        if($row==0){
            return true;
        }else{
            return false;
        }

    }

}

function verificarCreacion($user,$entrada,$conexion){

    $select = "SELECT *FROM entradas
     WHERE id=$entrada AND usuario_id=$user";
    $query = mysqli_query($conexion,$select);
    $row = mysqli_fetch_row($query);
    if($row==0){
        return false;
    }else{
        return true;
    }

}

