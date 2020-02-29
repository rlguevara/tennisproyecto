<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<div class="row">
    <div class="col-lg-8" style="margin-left:auto; margin-right:auto;">
        <div class="card">

                  <?php
                  
                  $vistaUsuario = new MvcController();
                  $vistaUsuario -> vistaEntrenadorController();

                ?>
        </div>
    </div>
</div>

