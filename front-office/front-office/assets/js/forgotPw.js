document.getElementById("oubliePw").addEventListener("submit", function (e) {
console.log('gfgf');
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
            document.getElementById("oublieSubmit").value = "Get Code";
        if (this.response) {
            if(this.response.emailNotExist){
                document.querySelector(".erreurAjax").innerHTML =this.response.emailNotExist ;

            }
            if(this.response.emailInvalide){
                document.querySelector(".erreurAjax").innerHTML =this.response.emailInvalide;

            }
            if(this.response.emailVide){
                document.querySelector(".erreurAjax").innerHTML =this.response.emailVide;

            }
            if( Object.keys(this.response).length ==1 && this.response.email ){
                
               document.location.href="forgotPassword2.php?email="+this.response.email;
            }
  
         
        } 
          
      }
     
    }
  
    xhr.open("POST", "../include/oubliAjax.php", true);

    xhr.responseType = "json";
    xhr.send(data);  
  })

 document.querySelector("#email").addEventListener('focus',function(){
document.querySelector(".erreurAjax").innerHTML = "";
 });