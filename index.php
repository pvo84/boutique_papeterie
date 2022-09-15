<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Espace bureau à domicile</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- JavaScript files-->
    <script src="client/utilitaires/jquery-3.6.0.min.js"></script>
    <script src="client/utilitaires/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script src="client/utilitaires/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script> 
    <script src="client/public/js/monJS.js"></script>
    <script src="client/public/js/requetes.js"></script>

    <!-- gLightbox gallery-->
    <link rel="stylesheet" href="client/utilitaires/glightbox/css/glightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="client/utilitaires/nouislider/nouislider.min.css">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="client/utilitaires/choices.js/public/assets/styles/choices.min.css">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="client/utilitaires/swiper/swiper-bundle.min.css"> 
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="client/public/css/style.default.css" id="theme-stylesheet">
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="client/public/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="client/public/images/favicon.png">
  </head>
  <body onLoad="chargerArticles('I','serveur/pages/articles/liste.php');">    
    <div class="page-holder">
   
    <?php
      include_once('serveur/includes/menu_accueil.inc.php');
  ?>
<!--MODAL-->

            <!-- Modal Enregistrer -->
        <div class="modal fade" id="modalEnreg" tabindex="-1" aria-labelledby="ModalEnregLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="ModalEnregLabel">Créer un compte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="formEnreg" action="serveur/pages/membre/enregistrerMembres.php" method="POST" onSubmit="return validerFormEnreg();">
                        <div class="col-md-4">
                          <label for="prenom" class="form-label">Prénom</label>
                          <input type="text" class="form-control" id="prenom" name="prenom" value="" required>
                        </div>
                        <div class="col-md-4">
                          <label for="nom" class="form-label">Nom</label>
                          <input type="text" class="form-control" id="nom" name="nom" value="" required>
                        </div>
                        <div class="col-md-4">
                                <label for="courriel" class="form-label">Courriel</label>
                                <input type="email" class="form-control" id="courriel" name="courriel" value="" required>
                        </div>
                        <div class="col-md-6">
                          <label for="pass" class="form-label">Mot Passe</label>
                          <input type="password" class="form-control" id="pass"  name="pass" title="Entre 8 et 10 caractères incluant un chiffre, une lettre majuscule, une lettre minuscule et au moins un caractère spécial"required pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])([a-zA-Z0-9@$!%*?&]{8,})$">
                        </div>
                        <div class="col-md-6">
                            <label for="cpass" class="form-label">Confirmer mot passe</label>
                            <input type="password" class="form-control" id="cpass"  name="cpass" required>
                        </div>
                        <span class="msgFormEnreg"> Pour des raisons statistiques </span>
                        <div class="form-check mb-3">
                          <input type="radio" class="form-check-input" id="feminin" value="F" name="sexe">
                          <label class="form-check-label" for="feminin">Féminin</label>
                        </div>
                        <div class="form-check mb-3">
                          <input type="radio" class="form-check-input" id="masculin" value="M" name="sexe">
                          <label class="form-check-label" for="masculin">Masculin</label>
                        </div>
                        <div class="col-md-6">
                          <label for="date" class="form-label">Date de naissance</label>
                          <input type="date" class="form-control" id="datenaissance"  name="datenaissance">
                        </div>
                        <div class="col-12">
                          <button class="btn btn-primary" type="submit">Enregister</button>
                        </div>
                      </form>
                </div>
            </div>
            </div>
        </div>

        <!-- Modal Connexion -->
        <div class="modal fade" id="modalConnexion" tabindex="-1" aria-labelledby="ModalConnexionLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="ModalConnexionLabel">Se connecter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="formConnexion" action="serveur/pages/connexion/connexion.php" method="POST">
                        <div class="col-md-4">
                                <label for="courriel" class="form-label">Courriel</label>
                                <input type="email" class="form-control" id="courrielc" name="courrielc" value="" required>
                        </div>
                        <div class="col-md-6">
                          <label for="pass" class="form-label">Mot Passe</label>
                          <input type="password" class="form-control" id="passc"  name="passc" required>
                        </div>
                        <div class="col-12">
                          <button class="btn btn-primary" type="submit">Connexion</button>
                        </div>
                      </form>
                </div>
            </div>
            </div>
        </div>

    </div>
    <form id="dc" action="serveur/pages/connexion/deconnecter.php" method="POST"></form>
<!--fin de modal-->
    
      <!-- HERO SECTION-->
      <div class="container"> 

        <!-- CATEGORIES SECTION-->
        <section class="pt-5">
          <header class="text-center">
          <p class="small text-muted small text-uppercase mb-1">Des partenaires clés de votre productivité</p>
          <h2 class="h5 text-uppercase mb-4">En vedette</h2>
         
        </header>
        <!--   <div class="row">
            <div class="col-md-4"><a class="category-item" href="shop.html"><img class="img-fluid" src="client/public/images/cat-img-1.jpg" alt=""/><strong class="category-item-title">Agendas et calendriers</strong></a>
            </div>
            <div class="col-md-4"><a class="category-item mb-4" href="shop.html"><img class="img-fluid" src="client/public/images/cat-img-2.jpg" alt=""/><strong class="category-item-title">Journaux et carnets</strong></a><a class="category-item" href="shop.html"><img class="img-fluid" src="client/public/images/cat-img-3.jpg" alt=""/><strong class="category-item-title">Accessoires de bureau</strong></a>
            </div>
            <div class="col-md-4"><a class="category-item" href="shop.html"><img class="img-fluid" src="client/public/images/cat-img-4.png" alt=""/><strong class="category-item-title">Stylos et accessoires d'écriture</strong></a>
            </div>
          </div> -->
        <!-- </section> -->
        <!-- TRENDING PRODUCTS-->
       <!--  <section class="py-5"> -->
<!--PRODUCTS-->


<div class="container" id="contenu"> </div>

<!-- END OF PRODUCTS-->
        </section>
        <!-- SERVICES-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row text-center gy-3">
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#delivery-time-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">Livraison gratuite</h6>
                      <p class="text-sm mb-0 text-muted">à domicile dès 50$ d'achats</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#helpline-24h-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                      <p class="text-sm mb-0 text-muted">Livraison gratuite</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#label-tag-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">Aubaineries</h6>
                      <p class="text-sm mb-0 text-muted">Profitez nos offres</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
     
      </div>
      <!-- FOOTER-->
      <?php
         require_once("serveur/includes/footer.inc.php");
    ?>
<!-- END of FOOTER-->

 <!-- JavaScript files from template-->
<script src="client/utilitaires/glightbox/js/glightbox.min.js"></script>
<script src="client/utilitaires/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="client/utilitaires/nouislider/nouislider.min.js"></script>
<script src="client/utilitaires/swiper/swiper-bundle.min.js"></script>
<script src="client/utilitaires/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="client/public/js/front.js"></script>

<!--ICONES-->
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
       
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
        
      </script>


      
 <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      
      </div>
  </body>
</html>