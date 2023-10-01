document.getElementById("contacterNous_form").addEventListener("submit", function (e) {
    e.preventDefault();

    var data = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
      
        if (this.readyState == 4 && this.status == 200) {
            if (this.response) 
            {
              
                if (this.response.nomVide) {

                    document.getElementById("nomError").innerHTML = this.response.nomVide;

                }
                if (this.response.emailVide) {

                    document.getElementById("emailError").innerHTML = this.response.emailVide;

                }
                if (this.response.messageVide) {

                    document.getElementById("messageError").innerHTML = this.response.messageVide;

                }
              
            }
           
        }
    };

    xhr.open("POST", "prof/include/contact.php", true);

    xhr.responseType = "json";
    xhr.send(data);

});

Array.prototype.forEach.call(document.querySelectorAll("#contacterNous_form  input,#ajouterCours_form  textarea"), function (el) {
      
    el.addEventListener('focus', function(){
        Array.prototype.forEach.call(document.getElementsByClassName("error"), function (ele) {
            ele.innerHTML = "";
        });
      
     });
  } );

