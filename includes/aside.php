<?php require_once("includes/helpers.php"); ?>

<aside id="sidebar">
            <div id="buscar" class="bloque">
                <h3>Buscar</h3>
                <form action="search.php" method="POST">
                    <input type="text" name="search" />
                    <input type="submit" name="submit" value="Buscar"/>
                </form>
                <?php cleanError(); ?> 

            </div>    

             <?php if(isset($_SESSION['usuario'])):  ?>
             <div class="bloque">
               <?php echo "Bienvenido: ".$_SESSION['usuario']['email'];  ?>
               <?php echo $_SESSION['usuario']['nombre'];  ?>

               <a href="crear_categoria.php" class="boton">Crear categorias</a>
               <a href="crear_entradas.php" class="boton btn-yellow">Crear entradas</a>
               <a href="update.php" class="boton btn-green">Mis datos</a>
               <a href="desloguear.php" class="boton btn-red">Salir</a>

             </div> 

            <?php else:  ?>
            <div id="login" class="bloque">
                <h3>Identificate</h3>
                <form action="login.php" method="POST">

                    <label for="email">Email</label>
                    <input type="email" name="email" />
                    <?= isset($_SESSION['errors_login'])?validadError($_SESSION['errors_login'],'correo'):'' ?> 

                    <label for="password">Password</label>
                    <input type="password" name="password" />
                    <?= isset($_SESSION['errors_login'])?validadError($_SESSION['errors_login'],'password'):'' ?> 


                    <input type="submit" name="submit" value="Entrar"/>
                </form>
                <?php cleanError(); ?> 

            </div>
            

           
            <div id="register" class="bloque">
                <h3 class="cosa">Registrate</h3>

                    <!-- Mostrar errores -->
                <?php if(isset($_SESSION['completado'])): ?>
                    <div class="alerta alert-exito">
                        <?=$_SESSION['completado']; ?>
                    </div>
                 <?php elseif(isset($_SESSION['errors']['general'])): ?>
                       <?=$_SESSION['errors']['general']; ?>

                 <?php endif; ?>   



                <form action="registro.php" method="POST">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" />
                    <?= isset($_SESSION['errors'])?validadError($_SESSION['errors'],'nombre'):'' ?> 
                    
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" />
                    <?= isset($_SESSION['errors'])?validadError($_SESSION['errors'],'apellido'):'' ?> 


                    <label for="email">Email</label>
                    <input type="email" name="email" />
                    <?= isset($_SESSION['errors'])?validadError($_SESSION['errors'],'email'):'' ?> 


                    <label for="password">Password</label>
                    <input type="password" name="password" />
                    <?= isset($_SESSION['errors'])?validadError($_SESSION['errors'],'password'):'' ?> 


                    <input type="submit" name="submit" value="Registrar"/>
                </form>
                <?php cleanError(); ?> 

            </div>
            <?php endif; ?>

        </aside>