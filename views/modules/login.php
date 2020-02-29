<?php

$ingreso = new MvcController();
$ingreso -> ingresoUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

    echo "Fallo al ingresar";
	
	}

}

?>

  <link href="assets/css/hola.css" rel="stylesheet" />

<div class="login-page">
  <div class="form">
    <form class="login-form" method="post">
      <input type="text" placeholder="username" name="usuarioIngreso"/>
      <input type="password" placeholder="password" name="passwordIngreso"/>
      <button type="submit" value="Enviar">Ingresar</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>