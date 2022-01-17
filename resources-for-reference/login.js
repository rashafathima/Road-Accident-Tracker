var input = document.getElementById('userid');

input.oninvalid = function(event) {
	event.target.setCustomValidity('UserID should only contain U followed by three digits. e.g.U100');
}
function signup() {
    var Username = document.getElementById("Username");
    var password = document.getElementById("password");

    const promise = auth.createUserWithUsernameAndPassword(Username.value, password.value);
    //
    promise.catch(e => alert(e.message));
    alert("SignUp Successfully");
}

//Login function
function signin() {
    var username = document.getElementById("Username");
    var password = document.getElementById("password");
    const promise = auth.signInWithUsernameAndPassword(Username.value, password.value);
    promise.catch(e => alert(e.message));
    alert("SignIn Successfully");
}
function SignOut() {
    auth.SignOut();
    alert("SignOut Successfully from System");
}