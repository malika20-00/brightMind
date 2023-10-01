if (document.getElementById("disableStudent")) {
    document.getElementById("disableStudent").addEventListener('click', function (e) {
        e.preventDefault();
        var x = e.target.nextElementSibling;
        

       window.location.href = "../../admin/include/activerCompteEtudiant.php?id=" + x.innerText + "&status=0";

    });
}
if (document.getElementById("disableinstructor")) {
    document.getElementById("disableinstructor").addEventListener('click', function (e) {
        e.preventDefault();
        var x = e.target.nextElementSibling;
        

       window.location.href = "../../admin/include/activerCompteProf.php?id=" + x.innerText + "&status=0";

    });
}

Array.prototype.forEach.call(document.querySelectorAll(".disableButton"),function(e){
    e.addEventListener('click',function(el){
        el.preventDefault();
        document.querySelector('.buttonDisable').click();
        var x = el.target.parentElement.parentElement.parentElement;
        
        document.getElementById("idStudent").innerHTML = x.children.item(0).innerHTML;
    })
   
});
  

//*************************enable */
if (document.getElementById("enableStudent")) {
    document.getElementById("enableStudent").addEventListener('click', function (e) {
        e.preventDefault();
        var x = e.target.nextElementSibling
        window.location.href = "../../admin/include/activerCompteEtudiant.php?id=" + x.innerText + "&status=1";

    });
}
if (document.getElementById("enableinstructor")) {
    document.getElementById("enableinstructor").addEventListener('click', function (e) {
        e.preventDefault();
        var x = e.target.nextElementSibling
        window.location.href = "../../admin/include/activerCompteProf.php?id=" + x.innerText + "&status=1";

    });
}


Array.prototype.forEach.call(document.querySelectorAll(".enableButton"),function(el){
    el.addEventListener('click',function(e){
        e.preventDefault();
        document.querySelector('.buttonEnable').click();
        var x = e.target.parentElement.parentElement.parentElement;
        // console.log(x.children.item(0).innerHTML);
        document.getElementById("idStudent2").innerHTML = x.children.item(0).innerHTML;
    });
});
/******************admin***************************************/

function disable(e) {
    document.querySelector('.buttonDisable').click();
   
    document.getElementById("idStudent").innerHTML = e;

}
function enable(e) {
    document.querySelector('.buttonEnable').click();
   
    document.getElementById("idStudentp").innerHTML = e;

}
if (document.getElementById("disableadmin")) {
    document.getElementById("disableadmin").addEventListener('click', function (e) {
        e.preventDefault();
        var x = e.target.nextElementSibling;
        

       window.location.href = "../../admin/include/activerCompte.php?id=" + x.innerText + "&status=0";

    });
}
if (document.getElementById("enableadmin")) {
    document.getElementById("enableadmin").addEventListener('click', function (e) {
        e.preventDefault();
        var x = e.target.nextElementSibling
        window.location.href = "../../admin/include/activerCompte.php?id=" + x.innerText + "&status=1";

    });
}
/****************************student***************************/
function disableStudent(id){
    document.querySelector('.buttonDisable').click();
   
    document.getElementById("idstudentdisable").innerHTML = id;
}
function enableStudent(id){
    document.querySelector('.buttonEnable').click();
   
    document.getElementById("idstudentenable").innerHTML = id;
}
/*********************instructor********************************/
function disableInstructor(id){
    document.querySelector('.buttonDisable').click();
   
    document.getElementById("idinstructordisable").innerHTML = id;
}
function enableInstructor(id){
    document.querySelector('.buttonEnable').click();
   
    document.getElementById("idinstructorenable").innerHTML = id;
}