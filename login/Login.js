
function signup() {
    var Email = document.getElementById("Email");
    var password = document.getElementById("password");

    const promise = auth.createUserWithUsernameAndPassword(Email.value, password.value);
    //
    promise.catch(e => alert(e.message));
    alert("SignUp Successfully");
}

//Login function
function signin() {
    var Email = document.getElementById("Username");
    var password = document.getElementById("password");
    const promise = auth.signInWithUsernameAndPassword(Email.value, password.value);
    promise.catch(e => alert(e.message));
    alert("SignIn Successfully");
}


function SignOut() {
    auth.SignOut();
    alert("SignOut Successfully from System");
}