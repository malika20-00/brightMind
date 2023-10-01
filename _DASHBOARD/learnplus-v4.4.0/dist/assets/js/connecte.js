document.getElementById("sign-in-form").addEventListener("submit", function (e) {
    e.preventDefault();

    var data = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState != 4) {
            document.getElementById("connecte").style.pointerEvents = "none";
            document.getElementById("connecte").value = "Loading...";


        }
        if (this.readyState == 4 && this.status == 200) {

            if (this.response) {

                document.getElementById("connecte").style.pointerEvents = "auto";
                document.getElementById("connecte").value = "Sign in";
                if (this.response.emailInvalide) {

                    document.getElementById("emailError").innerHTML = this.response.emailInvalide;

                }
                if (this.response.emailVide) {

                    document.getElementById("emailError").innerHTML = this.response.emailVide;

                }

                if (this.response.compteNonExist) {

                    document.getElementById("pwError").innerHTML = this.response.compteNonExist;

                }
                if (this.response.pwVide) {

                    document.getElementById("pwError").innerHTML = this.response.pwVide;

                }
                if (this.response.admin) {
                    window.location.href = "admin-dashboard.php";
                }
                if (this.response.prof) {

                    window.location.href = "../../../front-office/front-office/classes.php";
                }
            }

        };
    }

    xhr.open("POST", "../../admin/include/connecteAjax.php", true);

    xhr.responseType = "json";
    xhr.send(data);

});


Array.prototype.forEach.call(document.querySelectorAll("#sign-in-form  input"), function (el) {

    el.addEventListener('focus', function () {

        Array.prototype.forEach.call(document.querySelectorAll("#sign-in-form  p"), function (ele) {
            ele.innerHTML = "";
        });
    });
});

