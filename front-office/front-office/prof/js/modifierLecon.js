var nombreFile = 0;
  
document.getElementById('ajouterFile').addEventListener('click', function() {
  nombreFile++;
  var i = document.createElement('input');
  i.setAttribute("type", "file");
  i.setAttribute("name", "file" + nombreFile);
  i.setAttribute("onfocus", "supprimerErreur()");
  var addressContainer = document.getElementById("files");
  addressContainer.appendChild(i);
  var p = document.createElement('p');
  p.setAttribute("class", "error");

  p.setAttribute("id", "file" + nombreFile + 'Error');
  addressContainer.appendChild(p);

});

function deleteFile(id){
    document.getElementById('idfilesupprimer').value=id;
   
}

// document.getElementById("modifierLecon_form").addEventListener("submit", function(e) {
//   e.preventDefault();

//   var data = new FormData(this);

//   var xhr = new XMLHttpRequest();

//   xhr.onreadystatechange = function() {
//     if (this.readyState != 4) {
//       document.getElementById("update").style.pointerEvents = "none";
//       document.getElementById("update").value = "Loading...";


//     }
//     if (this.readyState == 4 && this.status == 200) {

//       document.getElementById("update").style.pointerEvents = "auto";
//       document.getElementById("update").value = "update";


//       if (this.response) {

//         if (this.response.titreVide) {

//           document.getElementById("titreError").innerHTML = this.response.titreVide;

//         }
        
//         if (this.response.descriptionVide) {

//           document.getElementById("descriptionError").innerHTML = this.response.descriptionVide;

//         }
        
//         var i;
        
//         for (i = 1; i < nombreFile + 1; i++) {
          
//           if (this.response['file' + i]) {

//            document.getElementById("file" + i + 'Error').innerHTML =this.response['file' + i];

//           }
//         }



//         document.getElementById("notsuccess").innerHTML = 'please fill the indicated fields';

//       }
//       else{
//         window.location.reload();
//         document.getElementById("success").innerHTML = 'the course has been added';
//       }
//     }
//   };

//   xhr.open("POST", "prof/include/modifierLecon.php", true);

//   xhr.responseType = "json";
//   xhr.send(data);

// });
Array.prototype.forEach.call(document.querySelectorAll("#modifierCours_form input,#modifierCours_form textarea"), function (el) {
    
  el.addEventListener('focus', function(){
      Array.prototype.forEach.call(document.getElementsByClassName("error"), function (ele) {
          ele.innerHTML = "";
         
      });
      document.getElementById('success').innerHTML="";
   });
} );
function supprimerErreur(){
  Array.prototype.forEach.call(document.getElementsByClassName("error"), function (ele) {
    ele.innerHTML = "";
  });
}

