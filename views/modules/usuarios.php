<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<div class="row">


                  <?php
                  
                    $vistaUsuario = new MvcController();
                    $vistaUsuario -> vistaUsuariosController();

                  ?>
                  
</div>