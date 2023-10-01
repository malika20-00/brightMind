document.getElementById("add-form").addEventListener("submit", function (e) {
    e.preventDefault();

    var data = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState != 4) {
            document.getElementById("add-admin").style.pointerEvents = "none";
            document.getElementById("add-admin").value = "Loading...";


        }
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("add-admin").style.pointerEvents = "auto";
            document.getElementById("add-admin").value = "Add Admin";

            Array.prototype.forEach.call(document.getElementsByClassName("error"), function (el) {
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
                if (this.response.telInvalide) {

                    document.getElementById("telError").innerHTML = this.response.telInvalide;

                }
                if (this.response.telVide) {

                    document.getElementById("telError").innerHTML = this.response.telVide;

                }
                if (this.response.cinInvalide) {

                    document.getElementById("cinError").innerHTML = this.response.cinInvalide;

                }
                if (this.response.cinVide) {

                    document.getElementById("cinError").innerHTML = this.response.cinVide;

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
                if(this.response.erreurEnvoi){
                    document.getElementById("error").innerHTML= this.response.erreurEnvoi;
                }

              
     
 
               
               

 if (this.response.length == 0) {
window.location.href = "listAdmin.php";
}
            }
        }
    };

    xhr.open("POST", "../../admin/include/inscrirAjax.php", true);

    xhr.responseType = "json";
    xhr.send(data);

});

Array.prototype.forEach.call(document.querySelectorAll("#add-form  input"), function (el) {
    
    el.addEventListener('focus', function(){
        Array.prototype.forEach.call(document.getElementsByClassName("error"), function (ele) {
            ele.innerHTML = "";
        });
     });
} );