
<!-- Menu de navigation -->
<header class="header bg-white">
        <div class="container px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-4 px-lg-0"> 
          <a class="navbar-brand" href="../../../index.php"><img class="logo" src="../../../client/public/images/logo.png"> </a>
            <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto">
                <li class="nav-item">
          <a id="idmt" class="nav-link active" href="../../../index.php">Acceuil</a>
          <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="../../../client/pages/shop.php">Magasiner</a>
                </li>
                <li class="nav-item, m">
                  <!-- Link--><a class="nav-link" href="../../../client/pages/detail.html">Produits</a>
                </li>           
              <!--   <li class="nav-item dropdown">
                    <a id="cat" class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Catégories
                    </a>
                    <ul id="selCategs" class="dropdown-menu dropdown-menu-dark"
                        aria-labelledby="navbarDarkDropdownMenuLink">
                    </ul>
                </li> -->
            </ul>
           
<ul class="navbar-nav ms-auto"> 
              <li class="nav-item">
                <a id="pr" class="nav-link"  data-bs-toggle="modal" data-bs-target="#modalEnreg" href="#"> <i class="fas fa-user me-1 text-gray fw-normal"> </i> Mon profil</a>
              </li>
              <li class="nav-item">
                <a id = "pa" class="nav-link" href="javascript:afficherPanier();"> <i class="fas fa-dolly-flatbed me-1 text-gray"></i> Panier <span id="nbart" small class="text-gray fw-normal">(0)</span> </a> 
              </li>
<li class="nav-item"> 
<button id="bdc" class="btn btn-black" onClick="deconnecter();">
                Déconnexion
        </button>
 </li> </ul>

        </div>
      
      </nav>
      </div>
      </header>
<!-- Fin de menu de navigation -->

