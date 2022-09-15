<?php
    if(!isset($_SESSION['usager'])){
        echo "Oups! Vous devez vous connecter avant";
       // exit;
    }
?>
<!-- Menu de navigation -->
<header class="header bg-light">
        <div class="container px-lg-3">
        <nav class="navbar navbar-expand-lg navbar-light py-4 px-lg-0"> 
          <a class="navbar-brand" href="../../../index.php"><img class="logo" src="../../../client/public/images/logo.png"> </a>
            <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto">
                <li class="nav-item">
                  <!-- Link--> <a class="nav-link active" href="#">Admin</a>
                </li>
                <li class="nav-item">
                  <!-- Link--> <a class="nav-link"   data-bs-toggle="modal" data-bs-target="#modalConnexion" href="#">Gérer les articles</a>
                </li>
               <!--  <li class="nav-item">
                  <a class="nav-link"   data-bs-toggle="modal" data-bs-target="#modalConnexion" href="#">Gérer les membres</a>
                </li> -->
</ul>
<ul class="navbar-nav ms-auto"> 
<li class="nav-item">             
<button class="btn btn-black" onClick="deconnecter();">
                Déconnexion
        </button> </li>
  </ul>
            </div> 
          </nav>
        </div>
      </header>

<!-- Fin de menu de navigation -->

