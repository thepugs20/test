$(document).ready(function(){
    $("#submit").click(function(){
      var email = document.getElementById('email').value;
      var password = document.getElementById('password').value;
      firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
        var errorCode = error.code;
        var errorMessage = error.message;

        window.alert("Error : " + errorMessage);

        // ...
      });
      user = firebase.auth().currentUser;

      if (user!=null){
        alert("mpike");
        //window.location = 'index.html';
      }
    });
});
