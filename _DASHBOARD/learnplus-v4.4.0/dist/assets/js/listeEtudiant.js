// if (document.getElementById("accept") != null) {
//     document.getElementById("accept").addEventListener('click', function(e) {

//         e.preventDefault();
//         var x = e.target.parentElement.parentElement.parentElement;
//         document.getElementById("popUpAffectation").click();
//         document.getElementById("prenom").value = x.children.item(1).innerHTML;
//         document.getElementById("nom").value = x.children.item(2).innerHTML;
//         document.getElementById("mail").value = x.children.item(3).innerHTML;
//         document.getElementById("idEtudiant").value = x.children.item(0).innerHTML;



//     });
// }
function accepte(id,prenom,nom,mail){
    document.getElementById("popUpAffectation").click();
    document.getElementById("prenomA").value = prenom;
        document.getElementById("nomA").value = nom;
        document.getElementById("mail").value = mail;
        document.getElementById("idEtudiant").value = id;


}
function refuse(id){
    document.querySelector('.buttonRefuse').click();
  
        document.getElementById("idStudent").innerHTML = id;


}
if (document.getElementById("lienRefus") != null) {

document.getElementById('lienRefus').addEventListener('click', function(e) {
    e.preventDefault();
    var x = e.target.nextElementSibling

    window.location.href = "../../admin/include/accepterOuRefuserEtudiant.php?id=" + x.innerHTML;

});}
// if (document.getElementById("refuser") != null) {
// document.getElementById('refuser').addEventListener('click', function(e) {
//     e.preventDefault();
//     document.querySelector('.buttonRefuse').click();
//     var x = e.target.parentElement.parentElement.parentElement;
    
//     document.getElementById("idStudent").innerHTML = x.children.item(0).innerHTML;

// });
// }