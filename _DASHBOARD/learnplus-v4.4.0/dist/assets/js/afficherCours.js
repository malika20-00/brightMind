function afficherCours(titre,desc,contenu){
document.querySelector(".contenu-cours").innerHTML = contenu; 
document.querySelector(".titre-cours").innerHTML = titre;  

document.querySelector('.button-afficher-cours').click();
}