<?php
require_once('includes/redirec.php');
if(isset($_POST['submit'])){
    require_once('includes/conexion.php');
    require_once('includes/helpers.php');
    require_once('includes/header.php');
    require_once('includes/aside.php');

    $search= isset($_POST['search'])? mysqli_escape_string($conexion,$_POST['search']): false;

    $entradas = listEntradas($conexion,$limit = null,$data =null,$search);

}
?>
<div id="principal">
<?php foreach($entradas as $entrada): ?>
            <article class="entrada">
            <a href="entrada.php?id=<?php echo $entrada['identrada']; ?>"> 
                <h2><?=$entrada['titulo'];?></h2>
                <span class="extra"><?=$entrada['nombre']."  ".$entrada['fecha']." ".$entrada['nombrecompleto'];?></span>
                <p>
                <?=substr($entrada['descripcion'],0 ,180)."...";?>
                </p>
             </a>
            </article>
            <?php endforeach; ?>
</div>


<?php require_once('includes/footer.php'); ?>
