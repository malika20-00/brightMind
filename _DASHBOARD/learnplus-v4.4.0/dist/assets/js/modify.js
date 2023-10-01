
function editerProf(id,prenom,nom,email,cin,tel){
    document.getElementById("prenom-edit").value = nom + " "+ prenom;
    document.getElementById("mail-edit").value = email;
    document.getElementById("cin-edit").value =cin;

    document.getElementById("tel-edit").value = tel;

    document.getElementById("idEtudiant-edit").value = id;
    document.getElementById("editProf").click();

}