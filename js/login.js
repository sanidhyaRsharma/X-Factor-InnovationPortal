function login(){
  var user = document.login.user_name.value;
  var pass = document.login.user_password.value;
  if(user == "" || pass == ""){
      alert("sorry...Please Enter Username and Passowrd");
    }else{
     alert("Please Enter Correct Credentials");
   }
}
