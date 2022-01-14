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
const storage = firebase.storage();
const storageRef = storage.ref();

//signOut

function signOut() {
    auth.signOut();
    alert("SignOut Successfully from System");
}

//active user to homepage
firebase.auth().onAuthStateChanged((user) => {
    if (user) {
        var email = user.email;
    } else {
        alert("No active user");
        window.location = 'signup.html';
    }
})

function upload() {
  var file = document.getElementById("submission").value;
var person = document.getElementById("person").value;
var plant = document.getElementById("plant").value;


const videosRef = storageRef.child("Videos/" + person + "/" + plant);
videosRef.put(file).then((snapshot) => {
  alert('Uploaded your file!');
});
}
