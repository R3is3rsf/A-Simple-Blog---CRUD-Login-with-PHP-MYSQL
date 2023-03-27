<?php require_once("includes/redirec.php"); ?>
<?php require_once("includes/header.php");  ?>
<?php require_once("includes/aside.php");  ?>

<div id="principal">
    <div class="bloque">
        <h1>Registrar entradas</h1>
        <?php if(isset($_SESSION['exito'])):   ?>
                <div class="alerta">
                    <?=$_SESSION['exito']?>
                </div>
        <?php endif; ?> 
        <form action="crear_entradas_proceso.php" method="post">
            <?php if(isset($_SESSION['error_titulo'])):   ?>
                <div class="alerta alerta-error">
                    <?=$_SESSION['error_titulo']?>
                </div>
            <?php endif; ?>    
            <label for="titulo">Titulo</label>    
            <input type="text" name="titulo">
            <?php if(isset($_SESSION['error_descripcion'])):   ?>
                <div class="alerta alerta-error">
                    <?=$_SESSION['error_descripcion']?>
                </div>
            <?php endif; ?>   
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion">
            <label for="categoria">Categoria</label>
            <select name="categoria">
                <?php
                $categorias=listCategorias($conexion);
                foreach($categorias as $categoria):
                ?>
                <option value=<?=$categoria['id']?>> <?=$categoria['nombre'];?></option>
                <?php endforeach; ?>
            </select>

            <input type="submit" name="submit" value="Registrar">
        </form>
        <?php cleanError();  ?>            

    </div>
</div>


<?php require_once("includes/footer.php");  ?>


