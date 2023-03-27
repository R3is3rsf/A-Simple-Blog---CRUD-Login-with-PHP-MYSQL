<?php
require_once("includes/header.php");
require_once("includes/aside.php");

$id=intval($_GET['id']);
$entrada=entradaId($conexion,$id,$data=false);

?>
<?php if(!empty($entrada)): ?>
       <div id="principal">
           <article class="entrada">
                <h1><?=$entrada['titulo']; ?></h1>
                    <a href=""> 
                       <span class="extra"><?=$entrada['nombre']."  ".$entrada['fecha']." ".$entrada['nombrecompleto'];?></span>
                       <p>
                       <?php echo $entrada['descripcion'];?>
                       </p>
                    </a>
                </article>

<?php if(!empty($entrada) && isset($_SESSION['usuario']) && verificarCreacion(($_SESSION['usuario']['id']),$id,$conexion)): ?>
    <a href="actualizarEntrada.php?id=<?= $id ?>" class="boton btn-yellow">Actualizar</a>
    <a href="borrarEntrada.php?id=<?= $id ?>" class="boton btn-green">Borrar</a>
<?php endif; ?>    

       </div>

<?php else:  ?>
<?php header('location:index.php') ?>
<?php endif;  ?>




<?php require_once("includes/footer.php"); ?>


