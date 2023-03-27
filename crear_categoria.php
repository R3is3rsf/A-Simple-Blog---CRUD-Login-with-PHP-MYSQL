<?php require_once("includes/redirec.php") ?>
<?php require_once("includes/redirec.php") ?>
<?php require_once ('includes/header.php')?>
<?php require_once('includes/helpers.php') ?>
    
<!--Barra lateral -->
<?php require_once("includes/aside.php") ?>


<div id="principal">
   

    <div class="bloque">
        <h1>Registrar categoria</h1>
        <form action="crear_categoria_proceso.php" method="post">
            <?php if(isset($_SESSION['exito'])):?>
                <div class="alerta">
                    <?=$_SESSION['exito']; ?>
                </div>    
            <?php endif; ?> 

            <?php if(isset($_SESSION['error'])):?>
                <div class="alerta alerta-error">
                    <?=$_SESSION['error']; ?>
                </div>    
            <?php endif; ?> 

            <label for="categoria">Categoria</label>
            <input type="text" name="categoria" placeholder="Ingrese nombre de la nueva categoria">
            <input type="submit" name="submit" value="Registrar">
        </form>
        <?php cleanError();  ?>            
    </div>

</div>
<!--Pie de pagina -->
<?php require_once("includes/footer.php"); ?>


