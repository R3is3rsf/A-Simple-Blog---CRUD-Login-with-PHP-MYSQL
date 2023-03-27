<?php
require_once('includes/redirec.php');
require_once('includes/header.php');
require_once ('includes/aside.php');

$user=userId($conexion,$_SESSION['usuario']['id']);

?>

<div id="principal">
    <div class="bloque">
        <?php if(isset($_SESSION['exito'])): ?>  
             <div class="alerta">
                <?=$_SESSION['exito'];  ?>
             </div>
        <?php endif;  ?>
        <h1>Actualizar mi informacion</h1>
        <form action="update_proceso.php" method="post">
            <input type="hidden" name="id" value=<?= $user['id']; ?> />

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="<?php echo $user['nombre']; ?>" >
            <?php if(isset($_SESSION['error']['nombre'])): ?>  
                 <div class="alerta alerta-error">
                    <?=$_SESSION['error']['nombre'];  ?>
                </div>
            <?php endif;  ?>

            <label for="apellido">Apellidos</label>
            <input type="text" name="apellido" value="<?php echo $user['apellidos']; ?>" />
            <?php if(isset($_SESSION['error']['apellido'])): ?>  
                 <div class="alerta alerta-error">
                    <?=$_SESSION['error']['apellido'];  ?>
                </div>
            <?php endif;  ?>

            <label for="email">Correo</label>
            <input type="text" name="email" value=<?= $user['email'] ?> />
            <?php if(isset($_SESSION['error']['email'])): ?>  
                 <div class="alerta alerta-error">
                    <?=$_SESSION['error']['email'];  ?>
                </div>
            <?php endif;  ?>

            <label for="password">Password</label>
            <input type="password" name="password" value=<?= $user['password'] ?> />
            <?php if(isset($_SESSION['error']['password'])): ?>  
                 <div class="alerta alerta-error">
                    <?=$_SESSION['error']['password'];  ?>
                </div>
            <?php endif;  ?>

            <input type="submit" name="submit" value="Actualizar">
        </form>
        <?=cleanError()?>
    </div>
</div>



<?php require_once('includes/footer.php')  ?>