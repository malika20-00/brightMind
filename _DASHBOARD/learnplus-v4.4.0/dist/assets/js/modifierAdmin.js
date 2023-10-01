document.getElementById("edit-form-admin").addEventListener("submit", function (e) {
    e.preventDefault();

    var data = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState != 4) {
            document.getElementById("submit-edit-admin").style.pointerEvents = "none";
            document.getElementById("submit-edit-admin").value = "Loading...";


        }
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("submit-edit-admin").style.pointerEvents = "auto";
            document.getElementById("submit-edit-admin").value = "Edit Admin";

            Array.prototype.forEach.call(document.getElementsByClassName("error"), function (el) {
                el.innerHTML = "";
            });

            if (this.response) {
               

                if (this.response.emailExist) {
                    document.getElementById("emailError-edit").innerHTML = this.response.emailExist;

                }
                if (this.response.emailInvalide) {

                    document.getElementById("emailError-edit").innerHTML = this.response.emailInvalide;

                }

                if (this.response.emailVide) {

                    document.getElementById("emailError-edit").innerHTML = this.response.emailVide;

                }
                if (this.response.length == 0) {
                    window.location.href = "listAdmin.php";
                }








            }
        }
    };

    xhr.open("POST", "../../admin/include/modifierAdmin.php", true);
    xhr.overrideMimeType('text/plain; charset=utf-8');


    xhr.responseType = "json";
    xhr.send(data);

});

Array.prototype.forEach.call(document.querySelectorAll("#edit-form-admin input"), function (el) {

    el.addEventListener('focus', function () {
        Array.prototype.forEach.call(document.getElementsByClassName("error"), function (ele) {
            ele.innerHTML = "";
        });
    });
});
function editer(id,nom,prenom,email,cin,tel){
document.querySelector('#id-edit-admin').value=id;
document.querySelector('#firstname-edit').value=prenom;
document.querySelector('#lastname-edit').value=nom;
document.querySelector('#email-edit').value=email;
document.querySelector('#cin-edit').value=cin;
document.querySelector('#phone-edit').value=tel;
document.querySelector('#button-edit-admin').click();



}