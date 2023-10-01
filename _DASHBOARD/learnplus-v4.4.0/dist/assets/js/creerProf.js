document.getElementById("sign-up-formm").addEventListener("submit", function (e) {
    e.preventDefault();

    var data = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState != 4) {
            document.getElementById("inscrir").style.pointerEvents = "none";
            document.getElementById("inscrir").value = "Loading...";


        }
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("inscrir").style.pointerEvents = "auto";
            document.getElementById("inscrir").value = "Add instructor";

            Array.prototype.forEach.call(document.getElementsByClassName("error"), function (el) {
                el.innerHTML = "";
            });

            if (this.response) {
                if (this.response.prenomInvalide) {

                    document.getElementById("prenomError-add").innerHTML = this.response.prenomInvalide;

                }
                if (this.response.prenomVide) {

                    document.getElementById("prenomError-add").innerHTML = this.response.prenomVide;

                }
                if (this.response.nomInvalide) {

                    document.getElementById("nomError-add").innerHTML = this.response.nomInvalide;

                }
                if (this.response.nomVide) {

                    document.getElementById("nomError-add").innerHTML = this.response.nomVide;

                }
                if (this.response.telInvalide) {

                    document.getElementById("telError-add").innerHTML = this.response.telInvalide;

                }
                if (this.response.telVide) {

                    document.getElementById("telError-add").innerHTML = this.response.telVide;

                }
                if (this.response.cinInvalide) {

                    document.getElementById("cinError-add").innerHTML = this.response.cinInvalide;

                }
                if (this.response.cinVide) {

                    document.getElementById("cinError-add").innerHTML = this.response.cinVide;

                }

                if (this.response.emailInvalide) {

                    document.getElementById("emailError-add").innerHTML = this.response.emailInvalide;

                }
                if (this.response.emailExist) {

                    document.getElementById("emailError-add").innerHTML = this.response.emailExist;

                }

                if (this.response.emailVide) {

                    document.getElementById("emailError-add").innerHTML = this.response.emailVide;

                }


                if (this.response.pwInvalide) {

                    document.getElementById("pwError-add").innerHTML = this.response.pwInvalide;

                }
                if (this.response.pwVide) {

                    document.getElementById("pwError-add").innerHTML = this.response.pwVide;

                }
                if (this.response.pwNotMatch) {

                    document.getElementById("pwVerifError-add").innerHTML = this.response.pwNotMatch;

                }
                if (this.response.pwVerifVide) {

                    document.getElementById("pwVerifError-add").innerHTML = this.response.pwVerifVide;

                }
                if (this.response.erreurEnvoi) {
                    document.getElementById("error").innerHTML = this.response.erreurEnvoi;
                }
                if (this.response.length == 0) {
                   document.querySelector("#error-add-instructor").innerHTML = "<span style='color:green'>the instructor was successfully added</sapn>";
                }







            }
        }
    };

    xhr.open("POST", "../../admin/include/creerProf.php", true);

    xhr.responseType = "json";
    xhr.send(data);

});

Array.prototype.forEach.call(document.querySelectorAll("#sign-up-form > input"), function (el) {

    el.addEventListener('focus', function () {
        Array.prototype.forEach.call(document.getElementsByClassName("error"), function (ele) {
            ele.innerHTML = "";
        });
    });
});