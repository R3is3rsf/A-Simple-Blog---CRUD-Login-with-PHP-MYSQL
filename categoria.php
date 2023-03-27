<?php

require_once("includes/header.php");
require_once("includes/aside.php");
$id=intval($_GET['id']);
$entradas=listEntradas($conexion,$limit=false,$id);

?>
<?php if(!empty($entradas)): ?>
       <div id="principal">

           
           <?php foreach($entradas AS $entrada): ?>

           <article class="entrada">
                    <a href="entrada.php?id=<?php echo $entrada['identrada']; ?>"> 
                       <h2><?=$entrada['titulo'];?></h2>
                       <span class="extra"><?=$entrada['nombre']."  ".$entrada['fecha']." ".$entrada['nombrecompleto'];?></span>
                       <p>
                       <?php echo $entrada['descripcion'];?>
                       </p>
                    </a>
           </article>

           <?php endforeach; ?>

       </div>
<?php else:  ?>
       <div class="principal">
        <div class="bloque">
            <div class="alerta alerta-error">
                <h2>No hay entradas en la categoria</h2>
                <?php header( "refresh:2;url=index.php" ); ?>
            </div>
        </div>
       </div> 
<?php endif;  ?>



<?php require_once("includes/footer.php"); ?>



