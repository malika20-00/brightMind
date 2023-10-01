document.getElementById("edit-form").addEventListener("submit", function (e) {
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
            document.getElementById("submit").value = "Edit Student";

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
                if(this.response.length == 0){
window.location.href = "studentlist.php";
                }








            }
        }
    };

    xhr.open("POST", "../../admin/include/modifierEtudiant.php", true);
    xhr.overrideMimeType('text/plain; charset=utf-8');


    xhr.responseType = "json";
    xhr.send(data);

});

Array.prototype.forEach.call(document.querySelectorAll("#edit-form input"), function (el) {

    el.addEventListener('focus', function () {
        Array.prototype.forEach.call(document.getElementsByClassName("error"), function (ele) {
            ele.innerHTML = "";
        });
    });
});
function edit(id,prenom,nom,email,phone,tab){
  
   
    $('.select-edit-student').val(tab.split(" ")); // Select the option with a value of '1'
    $('.select-edit-student').trigger('change');

    document.querySelector("#id-edit").value=id;
    document.querySelector("#id-edit-two").value=id;
    document.querySelector("#firstname-edit").value=prenom;
    document.querySelector("#lastname-edit").value=nom;
    document.querySelector("#email-edit").value=email;
    document.querySelector("#phone-edit").value=phone;
    document.querySelector("#pop-up-edit").click();
}


// function edit(id,prenom,nom,email,phone,tab){
    
//     document.querySelectorAll(".select-edit-student").forEach(function(el){
// el.options.forEach(function(e){
//  tab.split(" ").forEach(function(ell){
// if(ell == e.value ){
//     e.setAttribute('selected', true);
// }
//  });
//  })})
  
   
//     $('.select-edit-student').val(tab.split(" ")); // Select the option with a value of '1'
//     $('.select-edit-student').trigger('change');

//     document.querySelector("#id-edit").value=id;
//     document.querySelector("#id-edit-two").value=id;
//     document.querySelector("#firstname-edit").value=prenom;
// }