
// Array.prototype.forEach.call(document.querySelectorAll(".editClass"), function (el) {
//     el.addEventListener('click', function (e) {
//         e.preventDefault();
//         var x = e.target.parentElement.parentElement.parentElement.children.item(0).children.item(0).children.item(1);
//         console.log(x.children.item(1).innerHTML);
//         document.querySelector('.editButton').click();
//         document.getElementById("nom").value = x.children.item(0).innerHTML;
//          document.getElementById("idclassp").value = x.children.item(2).innerHTML;
//        // document.getElementById("teacher").value = x.children.item(1).innerHTML;
//         document.querySelector("#subject").value = x.children.item(3).innerHTML;


//         Array.prototype.forEach.call(document.querySelector("#prof").options,function(e){
//             if(e.value == x.children.item(4).innerHTML ){
//                 e.setAttribute('selected', true);
//             }
//         });





//     });
// });
function editerClass(nom,id,matiere,idteacher){
    document.getElementById("nom").value =nom;
    document.getElementById("idclassp").value = id;
   document.querySelector("#subject").value = matiere;
   document.querySelector('.editButton').click();
   Array.prototype.forEach.call(document.querySelector("#prof").options,function(e){
    if(e.value == idteacher ){
        e.setAttribute('selected', true);
    }
});
}
