document.getElementById("sign-form").addEventListener("submit", function (e) {
    e.preventDefault();

    var data = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState != 4) {
            document.getElementById("connecte").style.pointerEvents = "none";
            document.getElementById("connecte").innerHTML = "Loading...";


        }
        if (this.readyState == 4 && this.status == 200) {

            if (this.response) {
                document.getElementById("connecte").style.pointerEvents = "auto";
                document.getElementById("connecte").innerHTML = "LOg in Now";

                if (this.response.emailInvalide) {

                    document.getElementById("emailError").innerHTML = this.response.emailInvalide;

                }
                if (this.response.emailVide) {

                    document.getElementById("emailError").innerHTML = this.response.emailVide;

                }

                if (this.response.compteNonExist) {

                    document.getElementById("pwError").innerHTML = this.response.compteNonExist;

                }
                if (this.response.compteDisabled) {
                    document.getElementById("pwError").innerHTML = this.response.compteDisabled;

                }
                if (this.response.pwVide) {

                    document.getElementById("pwError").innerHTML = this.response.pwVide;

                }
                if (this.response.length == 0) {

                    window.location.href = "student-home.php";
                }
            }

        };
    }

    xhr.open("POST", "../include/connecteAjax.php", true);

    xhr.responseType = "json";
    xhr.send(data);

});


Array.prototype.forEach.call(document.querySelectorAll("#sign-form input"), function (el) {
    el.addEventListener('focus', function () {
        Array.prototype.forEach.call(document.querySelectorAll("#sign-in-form p"), function (ele) {
            ele.innerHTML = "";
        });
    });
});
if (document.getElementById("oubliePw")) {
    document.getElementById("oubliePw").addEventListener("submit", function (e) {

        e.preventDefault();
        var data = new FormData(this);
        var xhr = new XMLHttpRequest();
        //ecouter lorsqu'on a un changement d'état
        xhr.onreadystatechange = function () {
            if (this.readyState != 4) {
                document.getElementById("oublieSubmit").style.pointerEvents = "none";
                document.getElementById("oublieSubmit").value = "Loading...";


            }
            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("oublieSubmit").style.pointerEvents = "auto";
                document.getElementById("oublieSubmit").value = "get password";
                if (this.response) {
                    if (this.response.emailNotExist) {
                        document.querySelector(".erreurAjax").innerHTML = this.response.emailNotExist;

                    }
                    if (this.response.emailInvalide) {
                        document.querySelector(".erreurAjax").innerHTML = this.response.emailInvalide;

                    }
                    if (this.response.emailVide) {
                        document.querySelector(".erreurAjax").innerHTML = this.response.emailVide;

                    }
                    if (this.response.length == 0) {
                        document.querySelector(".erreurAjax").innerHTML = "<span style=\"color: #39ef39;\">the password has been sent to you</span>";
                    }


                }

            }

        }

        xhr.open("POST", "../include/oubliAjax.php", true);
        xhr.responseType = "json";
        xhr.send(data);
    })
}
if(document.querySelector("#emailOublie")){
document.querySelector("#emailOublie").addEventListener('focus', function () {
    document.querySelector(".erreurAjax").innerHTML = "";
});}