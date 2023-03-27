<?php
require_once('includes/header.php');
require_once('includes/redirec.php');
require_once('includes/conexion.php');
require_once('includes/helpers.php');
require_once('includes/aside.php');


if(isset($_GET['id'])){
    $id=$_GET['id'];
    $data=entradaId($conexion,$id,$data=false);
}
?>
<div id="principal">
    <div class="bloque">
        <h1>Actualizar datos de entrada</h1>
        <form action="actualizarEntradaProceso.php" method="POST">
            <input type="hidden" name="id" value=<?php echo $data['id']?>>
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" value="<?php echo $data['titulo']?>">
             <label for="descripcion">Descripcion</label>   
            <textarea name="descripcion" id="" cols="35" rows="10">
            <?php echo $data['descripcion']?>
            </textarea>
            <label for="categoria">Categoria</label>
            <select name="categoria">
                <?php
                $categorias=listCategorias($conexion);
                foreach($categorias as $categoria):
                ?>
                <?php if($categoria['id']==$data['categoria_id']):  ?>  
                    <option selected="selected" value=<?=$categoria['id']?>> <?=$categoria['nombre'];?></option>
                <?php endif; ?>  
                <?php if($categoria['id']!=$data['categoria_id']):  ?>  
                    <option value=<?=$categoria['id']?>> <?=$categoria['nombre'];?></option>
                <?php endif; ?>  

                <?php endforeach; ?>
            </select>
            <input type="submit" name="submit" value="Actualizar" class="boton">        
        </form>
    </div>
</div>



<?php require_once('includes/footer.php'); ?>