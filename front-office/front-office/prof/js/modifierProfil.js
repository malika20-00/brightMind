document.getElementById("modifierProfil_form").addEventListener("submit", function(e) {
    e.preventDefault();
  
    var data = new FormData(this);
  
    var xhr = new XMLHttpRequest();
  
    xhr.onreadystatechange = function() {
    
      if (this.readyState == 4 && this.status == 200) {
  
       
  
        if (this.response) {
  
          if (this.response.nomVide) {
  
            document.getElementById("nomError").innerHTML = this.response.nomVide;
  
          }
          if (this.response.prenomVide) {
  
            document.getElementById("prenomError").innerHTML = this.response.prenomVide;
  
          }
          if (this.response.emailVide) {
  
            document.getElementById("emailError").innerHTML = this.response.emailVide;
  
          }
          if (this.response.oldPasswordVide) {
  
            document.getElementById("oldPasswordError").innerHTML = this.response.oldPasswordVide;
  
          }
          if (this.response.oldPasswordIncorrect) {
  
            document.getElementById("oldPasswordError").innerHTML = this.response.oldPasswordIncorrect;
  
          }
         
  
        }
        else{
          window.location.reload();
        //  document.getElementById("success").innerHTML = 'the course has been added';
        }
      }
    };
  
    xhr.open("POST", "prof/include/modifierProfil.php", true);
  
    xhr.responseType = "json";
    xhr.send(data);
  
  });
  Array.prototype.forEach.call(document.querySelectorAll("#modifierProfil_form input"), function (el) {
      
    el.addEventListener('focus', function(){
        Array.prototype.forEach.call(document.getElementsByClassName("error"), function (ele) {
            ele.innerHTML = "";
           
        });
        document.getElementById('success').innerHTML="";
     });
  } );

  
  