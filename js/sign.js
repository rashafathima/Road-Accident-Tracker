// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
var firebaseConfig = {
    apiKey: "AIzaSyC3Edi-zUQw6gocj89PJ8KVaB5vA6wPcek",
    authDomain: "plantogram-a061d.firebaseapp.com",
    projectId: "plantogram-a061d",
    storageBucket: "plantogram-a061d.appspot.com",
    messagingSenderId: "575424887011",
    appId: "1:575424887011:web:beae853a40a2d151f7add6",
    measurementId: "G-CMT6X5T51C"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

const auth = firebase.auth();

//signup function
function signUp() {
    var email = document.getElementById("email");
    var password = document.getElementById("password");

    const promise = auth.createUserWithEmailAndPassword(email.value, password.value);
    //
    promise.catch(e => alert(e.message));
    alert("SignUp Successfully");
}

//signIN function
function signIn() {
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    const promise = auth.signInWithEmailAndPassword(email.value, password.value);
    promise.catch(e => alert(e.message));

}


//signOut

function signOut() {
    auth.signOut();
    alert("SignOut Successfully from System");
}

//active user to homepage
firebase.auth().onAuthStateChanged((user) => {
    if (user) {
        var email = user.email;
        alert("Active user " + email);
        window.location = 'main.php';
    } else {

    }
})
