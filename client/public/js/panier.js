
let panier = null;
const TAXES = 0.1556;
if (localStorage.getItem("panier") == undefined) {
    localStorage.setItem("panier", '[]'); //panier vide
}

let nbart = JSON.parse(localStorage.getItem("panier")).length;
let afficherNbart = "(" + nbart + ")";
$('#nbart').html(afficherNbart);

let ajouterPanier = (idArticle) => {
    panier = JSON.parse(localStorage.getItem("panier"));
    panier.push(idArticle);
    localStorage.setItem("panier", JSON.stringify(panier));
    ++nbart;
    afficherNbart = "(" + nbart + ")";
    $('#nbart').html(afficherNbart); //document.getElementById('nbart').innerHTML = afficherNbart;
}

let enleverArticle = (btnClose, idArticleEnlever) => {
    let montantArticle;
    if(btnClose.parentNode.previousSibling.nodeType == 3){//Noeud bidon type #text:espace
        montantArticle = parseFloat(btnClose.parentNode.previousSibling.previousSibling.firstChild.nodeValue);
    }else {
        montantArticle = parseFloat(btnClose.parentNode.previousSibling.firstChild.nodeValue);
    }
    let ancienTotal = parseFloat(document.getElementById("totalAchat").innerText); 
    let nouveauTotal = ancienTotal - montantArticle; //Pour mettre à jour la facture
    
    //Enlver l'article du visuel du panier
    let articleEnleverVisuelPanier = btnClose.parentNode.parentNode;
    articleEnleverVisuelPanier.parentNode.remove(articleEnleverVisuelPanier);

    //Mise à jour du localStorage
    panier = JSON.parse(localStorage.getItem("panier"));
    let nouveauPanier = panier.filter(idArticlePanier => {
        return idArticlePanier != idArticleEnlever; 
    })
    if (nouveauPanier.length == panier.length) {
        alert("L'article " + idArticleEnlever + " n'existe pas");
    } else {
        localStorage.setItem("panier", JSON.stringify(nouveauPanier));
        --nbart;
        afficherNbart = "(" + nbart + ")";
        $('#nbart').html(afficherNbart);
        mettreAJourLaFacture(nouveauTotal);
    }
    //document.querySelector("#divRetirer").style.display = 'none';
}

let mettreAJourLaFacture = (nouveauTotal) => {
    document.getElementById("totalAchat").innerText = nouveauTotal.toFixed(2) + "$";
    let montantTaxes = nouveauTotal * TAXES;
    let totalPayer = nouveauTotal + montantTaxes;
    document.getElementById("idTaxes").innerText = montantTaxes.toFixed(2) + "$"; 
    document.getElementById("totalPayer").innerText = totalPayer.toFixed(2) + "$"; 
}

let ajusterTotalAchat = (elemInput, prix, montantActuel) => {
    let ancienMontant;
    let qte = elemInput.value; 
    montantTotalCetArticle = (qte * prix);
    if(elemInput.parentNode.nextSibling.nodeType == 3){//Node bidon ajouté au DOM
        ancienMontant = parseFloat(elemInput.parentNode.nextSibling.nextSibling.firstChild.nodeValue);
        elemInput.parentNode.nextSibling.nextSibling.firstChild.nodeValue = montantTotalCetArticle+"$";
    }else {
        ancienMontant = parseFloat(elemInput.parentNode.nextSibling.firstChild.nodeValue);
        elemInput.parentNode.nextSibling.firstChild.nodeValue = montantTotalCetArticle+"$";
    }
    //Mise-à-jour de la facture
    let ancienTotal = parseFloat(document.getElementById("totalAchat").innerText); 
    let nouveauTotal = (ancienTotal - ancienMontant)+montantTotalCetArticle; 
    mettreAJourLaFacture(nouveauTotal);
} 

let payer = () => {
    document.getElementById("payer").innerHTML = "Merci pour votre paiement.";
}

let afficherPanier = () => {
    let panier = JSON.parse(localStorage.getItem("panier"));
    let nbArt = panier.length;
    let vuePanier = `
        <div class="card">
            <div class="row">
                <div class="col-md-8">
                    <div class="title">
                        <div class="row">
                            <div class="col">
                                <h2 class="h5 text-uppercase mb-4"><b>Panier d'achats</b></h2>
                                </div>
                        </div>
                    </div> 
        `;
    let listeArticlesAchetes = [];
    panier.forEach(idArticle => {
        listeArticlesAchetes.push(listeArticles.find(unArticle => unArticle.ida == idArticle));
    });
    let totalAchat = 0;
    let montantTotalCetArticle;
    for (let unArticle of listeArticlesAchetes) {
        montantTotalCetArticle = parseFloat(unArticle.prix);
        vuePanier += ` 
            <div class="row border-top border-bottom">
                <div class="row align-items-center">
                    <div class="col-2"><img src="../../../serveur/images_articles/${unArticle.imageart}" width="100"/></div>
                    <div class="col">
                        <div class="row text-muted">${unArticle.nom_article}</div>
                    </div>
                    <div class="col"> <input type="number" id="qte" name="qte" min="1" max="100" value=1 onChange="ajusterTotalAchat(this,${unArticle.prix}, ${montantTotalCetArticle});"></div>
                    <div class="col">${montantTotalCetArticle}$</div>
                    <div class="col"><div class="fas fa-trash-alt small text-muted" onClick="enleverArticle(this,${unArticle.ida});"></div></div>
                </div>
            </div>
        
        `;
        totalAchat += montantTotalCetArticle;
    }
    
    let montantTaxes = totalAchat * TAXES;
    let totalPayer = totalAchat + montantTaxes;

    vuePanier += `
            </div>
                    <div class="col-md-4 bg-light text-dark">
                        <div>
                            <h5 class="text-uppercase mb-4"><b>Facture</b></h5>
                        </div>
                        <hr>
                        <br/>
                        <div class="row">
                            <div class="col text-uppercase small font-weight-bold">Total achat</div>
                            <div id="totalAchat" class="col text-muted small">${totalAchat.toFixed(2)}$</div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col text-uppercase small font-weight-bold">Montant taxes</div>
                            <div id="idTaxes" class="col text-muted small">${montantTaxes.toFixed(2)}$</div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col" class="text-uppercase small font-weight-bold">MONTANT À PAYER</div>
                            <div id="totalPayer" class="col text-right">${totalPayer.toFixed(2)}$</div>
                        </div> 
                        </br>
                        <button class="btn btn-outline-dark btn-sm w-100" onclick="payer();">PAYER</button>
                        <span id="payer"></span>
                        <br/> 
                    </div>
                </div>
            </div>
        `;
    $('#contenuPanier').html(vuePanier);
    document.getElementById("payer").innerHTML = "";
    let modalPanier = new bootstrap.Modal(document.getElementById('idModPanier'), {});
    modalPanier.show();
}
