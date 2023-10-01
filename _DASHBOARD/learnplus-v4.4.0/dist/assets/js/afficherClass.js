window.afficherClass = afficherClass;
function afficherClass(arrayStudent,arrayCours) {
    var array = Object.keys(arrayStudent).map(function (key) {
        return arrayStudent[key];
    });
    arrayStudent = array;
var x = " "; 
    for (i = 0; i < array.length; i++) {
        x += "<tr><td>" + array[i][0].nom + "</td><td>" + array[i][0].prenom + "</td><td>" + array[i][0].email + "</td><td>" + array[i][0].niveauScolaire + "</td></tr>";
    }
document.querySelector(".arrayStudent").innerHTML = x;

var arrayCour = Object.keys(arrayCours).map(function (key) {
    return arrayCours[key];
});
arrayCours = arrayCour;

var x = ' <table class="table table-striped table-bordered" style="width:100%"><tbody class="list" id="staff"> <tr class="selected">        '; 
for (i = 0; i < arrayCours.length; i++) {
    x += "<td><td><span style=\"cursor:pointer;\"><i class=\"fa fa-file-pdf-o \" style=\"font-size:25px;color:red; \"></i>  " + arrayCours[i][0][1]+"</span></td></td><td><small class=\"text-muted\">"+arrayCours[i][0][2]+" chapters & "+arrayCours[i][0][3]+" lessons</small></td>" ;
}
x+= ' </tr></tbody></table>'
document.querySelector(".arrayCours").innerHTML = x;

document.querySelector(".button-afficher-class").click();
}