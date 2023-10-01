function show1(){
    var x = document.getElementById("pw");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }  
  function onChange() {
      const password = document.querySelector('input[name=pw]');
      const confirm = document.querySelector('input[name=pwVerif]');
      if (confirm.value === password.value) {
        confirm.setCustomValidity('');
      } else {
        confirm.setCustomValidity('Passwords do not match');
      }
    }