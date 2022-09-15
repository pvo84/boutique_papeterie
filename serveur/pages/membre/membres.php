<?php
    session_start();    
    if(!isset($_SESSION['usager'])){
        header('Location: ../../../index.php?msg=Problème+avec+votre+connexion');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membres</title>
    <!-- Javascript files-->

    <script src="../../../client/utilitaires/jquery-3.6.0.min.js"></script>
    <script src="../../../client/utilitaires/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script src="../../../client/utilitaires/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script> 

    <script src="../../../client/public/js/monJS.js"></script>
    <script src="../../../client/public/js/panier.js"></script>
    <script src="../../../client/public/js/requetes.js"></script>

    <!-- gLightbox gallery-->
    <link rel="stylesheet" href="../../../client/utilitaires/glightbox/css/glightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="../../../client/utilitaires/nouislider/nouislider.min.css">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="../../../client/utilitaires/choices.js/public/assets/styles/choices.min.css">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="../../../client/utilitaires/swiper/swiper-bundle.min.css"> 
<!-- Google fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
<!-- theme stylesheet-->
<link rel="stylesheet" href="../../../client/public/css/style.default.css" id="theme-stylesheet">
<!-- Custom stylesheet -->
<link rel="stylesheet" href="../../../client/public/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../../../client/public/images/favicon.png">
</head>
<body onLoad="chargerArticles('M','../articles/liste.php');">

    <?php
         require_once("../../includes/menu_membre.inc.php");
    ?>
    <form id="dc" action="../connexion/deconnecter.php" method="POST"></form>
      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Magasiner</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="index.php">Acceuil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Bureau</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <div class="container p-0">
           <!-- <div class="row"> -->
  <!--list de produits-->
  
 <!--  <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0"> -->
             <!--  <div class="row"> -->
                <div class="container" id="contenu"></div>
  <!-- Modal du panier -->
  <div class="modal fade" id="idModPanier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="contenuPanier"></div>
      </div>
    </div>
  </div>
<!-- </div> -->
 <!-- Fin du modal du panier -->
               
<!--fin de list de produits-->
            <!--   </div> -->
           <!--  </div> -->
          </div>
        </section>
      </div>
<?php
         require_once("../../includes/footer.inc.php");
    ?>
    <!-- JavaScript files-->
      <script src="../../../client/utilitaires/choices.js/public/assets/scripts/choices.min.js"></script>
      <script>
  function injectSvgSprite(path) {
        
        var ajax = new XMLHttpRequest();
        ajax.open("GET", path, true);
        ajax.send();
        ajax.onload = function(e) {
        var div = document.createElement("div");
        div.className = 'd-none';
        div.innerHTML = ajax.responseText;
        document.body.insertBefore(div, document.body.childNodes[0]);
        }
    }
    // this is set to BootstrapTemple website as you cannot 
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
    
  </script>
  <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</div>
</body>
</html>