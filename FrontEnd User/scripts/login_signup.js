/*Check whether the user wants to signup or login and act accordingly*/
function loginSignup() {
    document.getElementById("register").addEventListener("click", showSignUp);
    document.getElementById("login").addEventListener("click", loginToMain);
}

/*If the user clicks on signup*/
function showSignUp() {
    /*Defining variables*/
    let loginbox = document.getElementById("loginBox");
    let signupbox = document.getElementById("signupBox");
    let backbtn = document.getElementById("back");
    let submit_signup = document.getElementById("s");

    /*If clicked on signup, go to signup box and hide login box*/
    loginbox.style.display = "none";
    signupbox.style.display = "block";
    backbtn.addEventListener("click", function() {
        signupbox.style.display = "none";
        loginbox.style.display = "block";
    });
}

function loginToMain() {}
loginSignup();