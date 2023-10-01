// function onChange() {
//     var x = document.getElementById("password");
//     var y = document.getElementById("cpassword");

//     // const password = document.querySelector('input[name=password]');
//     // const confirm = document.querySelector('input[name=cpassword]');
//     if (y.value === x.value) {
//       y.setCustomValidity('');
//     } else {
//       y.setCustomValidity('Passwords do not match');
//     }
//   }
function show(){
  var x = document.getElementById("pw");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}  
