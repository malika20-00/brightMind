document.getElementById("edit-class").addEventListener("submit", function (e) {
    e.preventDefault();

    var data = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState != 4) {
            document.getElementById("submit").style.pointerEvents = "none";
            document.getElementById("submit").value = "Loading...";


        }
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("submit").style.pointerEvents = "auto";
            document.getElementById("submit").value = "Edit Class";

            Array.prototype.forEach.call(document.getElementsByClassName("error"), function (el) {
                el.innerHTML = "";
            });

            if (this.response) {

                if (this.response.nomExist) {
                    document.getElementById("nomError").innerHTML = this.response.nomExist;

                }
                if (this.response.nomVide) {

                    document.getElementById("nomError").innerHTML = this.response.nomVide;

                }
                if (this.response.subjectVide) {

                    document.getElementById("subjectError").innerHTML = this.response.subjectVide;

                }
                if (this.response.teacherVide) {

                    document.getElementById("teacherError").innerHTML = this.response.teacherVide;

                }


                if (this.response.length == 0) {
                    window.location.href = "listClass.php";
                }





            }
        }
    };

    xhr.open("POST", "../../admin/include/ajouterClassAjax.php", true);

    xhr.responseType = "json";
    xhr.send(data);

});

Array.prototype.forEach.call(document.querySelectorAll("#edit-class input"), function (el) {

    el.addEventListener('focus', function () {
        Array.prototype.forEach.call(document.getElementsByClassName("error"), function (ele) {
            ele.innerHTML = "";
        });
    });
});