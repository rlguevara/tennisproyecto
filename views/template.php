<?php

include "modules/header.php";

?>

  <body class="">
    <div class="wrapper ">

      <?php

    include "modules/sidebar.php";

    ?>

        <div class="main-panel">
          <?php

        include "modules/navbar.php";

        ?>
            <div class="panel-header panel-header-sm">

            </div>
            <div class="content">

<?php 

$mvc = new MvcController();
$mvc -> enlacesPaginasController();

?>

            </div>
            <footer class="footer">
            </footer>
        </div>
    </div>
  </body>

  </html>
