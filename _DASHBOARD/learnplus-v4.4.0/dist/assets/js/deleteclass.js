

document.getElementById("delete").addEventListener('click', function (e) {

    e.preventDefault();
    var x = e.target.nextElementSibling;
    console.log(x);

    window.location.href = "../../admin/include/supprimerClass.php?id=" + x.innerHTML;
});
// function fun(e){
//     e.preventDefault();
//     var x = e.target.nextElementSibling;
//     console.log(x);

//     window.location.href = "../../admin/include/supprimerClass.php?id=" + x.innerHTML;
// }
function deleterClass(id){
    document.querySelector(".p-in-modal").innerHTML = id;
    document.querySelector('.button-delete').click();

 

}