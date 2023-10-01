function afficher(id, prenom, nom, email, cin, tel, matiere, nbrClass, nbrCourses, nbrEtudiant,nbrFile,nbrCoursesDisabled,nbrAccountDisabled) {
    document.querySelector("#afficher-nom").innerHTML = prenom + " " + nom;
    document.querySelector("#afficher-full-name").innerHTML = prenom + " " + nom;
    document.querySelector("#afficher-cin").innerHTML = cin;
    document.querySelector("#afficher-phone").innerHTML = tel;
    document.querySelector("#afficher-email").innerHTML = email;
    document.querySelector("#afficher-matiere").innerHTML = matiere;
    document.querySelector("#afficher-nbr-classes").innerHTML = nbrClass;
    document.querySelector("#afficher-nbr-courses").innerHTML = nbrCourses;
    document.querySelector("#afficher-nbr-etudiant").innerHTML = nbrEtudiant;
    document.querySelector("#nbr-file").innerText = nbrFile;
    document.querySelector("#nbr-cours-disabled").innerText = nbrCoursesDisabled;
    document.querySelector("#nbr-account-disabled").innerText = nbrAccountDisabled;

    document.querySelector("#a-view-details").href = "instructor-details.php?id=" + id;
    document.querySelector(".buttonShow").click();


}