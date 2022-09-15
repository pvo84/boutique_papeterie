let imagesURL = null;
let provenanceAppel = null;
let listeArticles = null;

let remplirCard = unArticle => {
    let rep = ' <div class="col-xl-3 col-lg-4 col-sm-6">'
    rep += '<div class="card">'
    rep +=
        ' <img src="' + imagesURL +
        unArticle.imageart +
        '"width:100 heigth:100 class="card-img-top tailleImg" alt="...">'
    rep += ' <div class="card-body">'
    rep += ' <h5 class="card-title">' + unArticle.nom_article + '</h5>'
    rep +=
        ' <p class="card-text">' +
        unArticle.description.substring(0, 30) +
        '...</p>'
    rep += ' <p class="small text-muted">' + unArticle.prix + '$</p>'
    if (provenanceAppel == 'M') {
        rep +=
            ' <a href="#" onClick="ajouterPanier(' + unArticle.ida + ');" <i class="btn btn-dark btn-sm w-100 h-100 d-flex align-items-center justify-content-center px-0">Ajouter au panier</i> </a>' 
    }
    rep += ' </div>'
    rep += ' </div>'
    rep += ' </div>'
    return rep
}

let listerArticles = () => {
    let contenu = `<div class="row">`
    for (let unArticle of listeArticles) {
        contenu += remplirCard(unArticle)
    }
    contenu += `</div>`
    $('#contenu').html(contenu) //document.getElementById('contenu').innerHTML=contenu;
}
/* let listerCategories = () => {
    let leSel = document.getElementById('selCategs');
    let rep="";
    for(let uneCateg of listeCategories){
       rep+=`<li><a class="dropdown-item" href="javascript:obtenirXML('${uneCateg.substring(0,3)}');">${uneCateg}</a></li>`;
    }
    leSel.innerHTML=rep;
  } */
  
 let listerCategoriesForm = () => {
    let leSel = document.getElementById('categ');
    for(let uneCateg of listeCategories){
        if(uneCateg !== "Toutes"){
          leSel.options[leSel.options.length] = new Option(uneCateg, uneCateg.substring(0,3).toLowerCase());
        }
    }
  } 
//allerURL contient le url où se trouve le fichier liste.php
//Provenance si l'Appel provient de index.php ou membres.php
//imagesURL selon la provenance contiendra le bon chemin où se trouve les images des articles
let chargerArticles = (provenance, allerURL) => {
    provenanceAppel = provenance;
    imagesURL = (provenance == 'I') ? "serveur/images_articles/" : "../../images_articles/";
    $.ajax({
        type: 'POST',
        url: allerURL,
        dataType: 'json',
        success: reponse => {
            if (reponse.OK) {
                listeArticles = reponse.listeArticles;
                listeCategories = reponse.categories;
                if(provenance == "I" || provenance == "M"){
                   //listerCategories();
                    listerArticles();
                }else {// A-Admmin
                    //listerCategories();
                    listerCategoriesForm();
                    genererPagination(); //À partir de listeArticles
                }
            }
        },
        fail: e => {
            alert('Problème avec votre requête')
        }
    })
}