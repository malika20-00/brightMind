document.getElementById("deleteFile_form").addEventListener("submit", function (e) {
    e.preventDefault();

    var data = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
      
        if (this.readyState == 4 && this.status == 200) {

            if (this.response) {
               
                document.getElementById(this.response).style.display="none";
            }
           
           document.getElementById('cancelFile').click();
        }
    };

    xhr.open("POST", "prof/include/supprimerFile.php", true);

    xhr.responseType = "json";
    xhr.send(data);

});