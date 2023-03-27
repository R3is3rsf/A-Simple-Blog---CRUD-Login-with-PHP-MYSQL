<?php require_once ('includes/header.php')?>
    

        <!--Barra lateral -->
    <?php require_once("includes/aside.php") ?>
    
        <!--Caja principal -->
        <div id="principal">
            <h1>Todas las entradas</h1>
            <?php $entradas=listEntradas($conexion,$limit=false);  ?>

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


    <!--Pie de pagina -->
    <?php require_once("includes/footer.php"); ?>




</body>
</html>