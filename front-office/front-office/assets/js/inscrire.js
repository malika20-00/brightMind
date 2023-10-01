document.getElementById("sign-up-form").addEventListener("submit", function (e) {
    e.preventDefault();

    var data = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState != 4) {
            document.getElementById("inscrir").style.pointerEvents = "none";
            document.getElementById("inscrir").innerHTML = "Loading...";


        }
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("inscrir").style.pointerEvents = "auto";
            document.getElementById("inscrir").innerHTML = "Register";

            Array.prototype.forEach.call(document.getElementsByClassName("error"), function (el) {
                el.innerHTML = "";
            });

            if (this.response) {
                if (this.response.prenomInvalide) {

                    document.getElementById("prenomErrorRR").innerHTML = this.response.prenomInvalide;

                }
                if (this.response.prenomVide) {

                    document.getElementById("prenomErrorRR").innerHTML = this.response.prenomVide;

                }
                if (this.response.nomInvalide) {

                    document.getElementById("nomErrorRR").innerHTML = this.response.nomInvalide;

                }
                if (this.response.nomVide) {

                    document.getElementById("nomErrorRR").innerHTML = this.response.nomVide;

                }
                if (this.response.emailInvalide) {

                    document.getElementById("emailErrorRR").innerHTML = this.response.emailInvalide;

                }
                if (this.response.emailExist) {

                    document.getElementById("emailErrorRR").innerHTML = this.response.emailExist;

                }

                if (this.response.emailVide) {

                    document.getElementById("emailErrorRR").innerHTML = this.response.emailVide;

                }
                if (this.response.niveauScolaireInvalid) {

                    document.getElementById("niveauErrorRR").innerHTML = this.response.niveauScolaireInvalid;

                }
                if (this.response.niveauScolaireVide) {

                    document.getElementById("niveauErrorRR").innerHTML = this.response.niveauScolaireVide;

                }
                if (this.response.telInvalide) {

                    document.getElementById("telErrorRR").innerHTML = this.response.telInvalide;

                }
                if (this.response.telVide) {

                    document.getElementById("telErrorRR").innerHTML = this.response.telVide;

                }

                if (this.response.pwInvalide) {

                    document.getElementById("pwErrorRR").innerHTML = this.response.pwInvalide;

                }
                if (this.response.pwVide) {

                    document.getElementById("pwErrorRR").innerHTML = this.response.pwVide;

                }
                if (this.response.pwNotMatch) {

                    document.getElementById("pwVerifErrorRR").innerHTML = this.response.pwNotMatch;

                }
                if (this.response.pwVerifVide) {

                    document.getElementById("pwVerifErrorRR").innerHTML = this.response.pwVerifVide;

                }
                if (this.response.erreurEnvoi) {
                    document.getElementById("errorRR").innerHTML = this.response.erreurEnvoi;
                }
                if (this.response.length == 0) {

                    window.location.href = "student-home.php";
                }






            }
        }
    };

    xhr.open("POST", "../include/inscrirAjax.php", true);

    xhr.responseType = "json";
    xhr.send(data);

});

Array.prototype.forEach.call(document.querySelectorAll("#sign-up-form  input"), function (el) {
    el.addEventListener('focus', function () {
        Array.prototype.forEach.call(document.getElementsByClassName("error"), function (ele) {
            ele.innerHTML = "";
        });
    });
});

document.querySelector('#register').addEventListener('click', function (e) {
    document.querySelector('#close-modal').click();
    document.querySelector('#register-button').click();

});
$(document).ready(function () {
    $('#myModalR').on('shown.bs.modal', function () { $('body').addClass('modal-open'); });
});

/******************************************************** */
document.getElementById("form-register").addEventListener("submit", function (e) {
    e.preventDefault();

    var data = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState != 4) {
            document.getElementById("inscrir").style.pointerEvents = "none";
            document.getElementById("inscrir").innerHTML = "Loading...";


        }
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("inscrir").style.pointerEvents = "auto";
            document.getElementById("inscrir").innerHTML = "REGISTER";

            Array.prototype.forEach.call(document.getElementsByClassName("error"), function (el) {
                el.innerHTML = "";
            });

            if (this.response) {
                if (this.response.prenomInvalide) {

                    document.getElementById("prenomErrorR").innerHTML = this.response.prenomInvalide;

                }
                if (this.response.prenomVide) {

                    document.getElementById("prenomErrorR").innerHTML = this.response.prenomVide;

                }
                if (this.response.nomInvalide) {

                    document.getElementById("nomErrorR").innerHTML = this.response.nomInvalide;

                }
                if (this.response.nomVide) {

                    document.getElementById("nomErrorR").innerHTML = this.response.nomVide;

                }
                if (this.response.telInvalide) {

                    document.getElementById("telErrorR").innerHTML = this.response.telInvalide;

                }
                if (this.response.telVide) {

                    document.getElementById("telErrorR").innerHTML = this.response.telVide;

                }






                if (this.response.emailInvalide) {

                    document.getElementById("emailErrorR").innerHTML = this.response.emailInvalide;

                }
                if (this.response.emailExist) {

                    document.getElementById("emailErrorR").innerHTML = this.response.emailExist;

                }

                if (this.response.emailVide) {

                    document.getElementById("emailErrorR").innerHTML = this.response.emailVide;

                }
                if (this.response.niveauScolaireInvalid) {

                    document.getElementById("niveauErrorR").innerHTML = this.response.niveauScolaireInvalid;

                }
                if (this.response.niveauScolaireVide) {

                    document.getElementById("niveauErrorR").innerHTML = this.response.niveauScolaireVide;

                }

                if (this.response.pwInvalide) {

                    document.getElementById("pwErrorR").innerHTML = this.response.pwInvalide;

                }
                if (this.response.pwVide) {

                    document.getElementById("pwErrorR").innerHTML = this.response.pwVide;

                }
                if (this.response.pwNotMatch) {

                    document.getElementById("pwVerifErrorR").innerHTML = this.response.pwNotMatch;

                }
                if (this.response.pwVerifVide) {

                    document.getElementById("pwVerifErrorR").innerHTML = this.response.pwVerifVide;

                }
                if (this.response.erreurEnvoi) {
                    document.getElementById("error").innerHTML = this.response.erreurEnvoi;
                }
                if (this.response.length == 0) {

                    window.location.href = "student-home.php";
                }






            }
        }
    };

    xhr.open("POST", "../include/inscrirAjax.php", true);

    xhr.responseType = "json";
    xhr.send(data);

});

Array.prototype.forEach.call(document.querySelectorAll("#form-register  input"), function (el) {
    el.addEventListener('focus', function () {
        Array.prototype.forEach.call(document.getElementsByClassName("error"), function (ele) {
            ele.innerHTML = "";
        });
    });
});