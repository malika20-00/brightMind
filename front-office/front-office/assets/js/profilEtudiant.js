
                              
document.getElementById("forme-edit").addEventListener("submit", function(e) {
    e.preventDefault();

    var data = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (this.readyState != 4) {
            document.getElementById("submit").style.pointerEvents = "none";
            document.getElementById("submit").innerHTML = "Loading...";


        }
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("submit").style.pointerEvents = "auto";
            document.getElementById("submit").innerHTML = "Save changes";

            Array.prototype.forEach.call(document.getElementsByClassName("error"), function(el) {
                el.innerHTML = "";
            });

            if (this.response) {


                if (this.response.prenomInvalide) {

                    document.getElementById("prenomError").innerHTML = this.response.prenomInvalide;

                }
                if (this.response.prenomVide) {

                    document.getElementById("prenomError").innerHTML = this.response.prenomVide;

                }
                if (this.response.nomInvalide) {

                    document.getElementById("nomError").innerHTML = this.response.nomInvalide;

                }
                if (this.response.nomVide) {

                    document.getElementById("nomError").innerHTML = this.response.nomVide;

                }


                if (this.response.emailInvalide) {

                    document.getElementById("emailError").innerHTML = this.response.emailInvalide;

                }
                if (this.response.emailExist) {

                    document.getElementById("emailError").innerHTML = this.response.emailExist;

                }

                if (this.response.emailVide) {

                    document.getElementById("emailError").innerHTML = this.response.emailVide;

                }
                if (this.response.cinInvalide) {

                    document.getElementById("cinError").innerHTML = this.response.cinInvalide;

                }
                if (this.response.cinVide) {

                    document.getElementById("cinError").innerHTML = this.response.cinVide;

                }
                if (this.response.niveauScolaireInvalide) {

                    document.getElementById("niveauError").innerHTML = this.response.niveauScolaireInvalide;

                }
                if (this.response.niveauScolaireVide) {

                    document.getElementById("niveauError").innerHTML = this.response.niveauScolaireVide;

                }
                if (this.response.telInvalide) {

                    document.getElementById("telError").innerHTML = this.response.telInvalide;

                }
                if (this.response.telVide) {

                    document.getElementById("telError").innerHTML = this.response.telVide;

                }

                if (this.response.pwInvalide) {

                    document.getElementById("pwError").innerHTML = this.response.pwInvalide;

                }
                if (this.response.pwVide) {

                    document.getElementById("pwError").innerHTML = this.response.pwVide;

                }
                if (this.response.pwNotMatch) {

                    document.getElementById("pwVerifError").innerHTML = this.response.pwNotMatch;

                }
                if (this.response.pwVerifVide) {

                    document.getElementById("pwVerifError").innerHTML = this.response.pwVerifVide;

                }
                if (this.response.length == 0) {
                    document.getElementById("success").innerHTML = "<span style =\"color:green;\">your data has been changed with success</span>";
                }

            }
        }
    };

    xhr.open("POST", "../include/profileAjax.php", true);

    xhr.responseType = "json";
    xhr.send(data);

});
Array.prototype.forEach.call(document.querySelectorAll("#forme-edit input"), function(el) {

    el.addEventListener('focus', function() {
        Array.prototype.forEach.call(document.getElementsByClassName("error"), function(ele) {
            ele.innerHTML = "";
        });
        document.getElementById("success").innerHTML ="";
    });
});
