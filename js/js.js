// roll out text in toHome
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        let subTitle = document.getElementById("homeSubTitle");
        subTitle.classList.add("visible");
    }, 1000);
    setTimeout(function() {
        let slogan = document.getElementById("homeSlogan");
        slogan.classList.add("visible");
    }, 3000);
});

// add event onclick for button login in homepage
const loginButton = document.getElementById('homeToLogin');
const wrapContainer = document.getElementById('homeWrapContainer');
const loginInHome = document.getElementById('homeLogin');

loginButton.addEventListener("click", function () {
    fadeBackground();
    callLoginPopUp();
});
// fades out everything in wrap container
function fadeBackground() {
    wrapContainer.style.opacity = "0.4";
    wrapContainer.style.pointerEvents = "none";
}
// show hidden <div>
function callLoginPopUp () {
    loginInHome.style.display = "flex";
}

//add event onclick for button "back" in popup-login in homepage
const homeLoginBack = document.getElementById('homeLoginBack');
homeLoginBack.addEventListener("click", backLogin);

// go back to homepage so DOMContentLoaded doesn't happen again
function backLogin () {
    loginInHome.style.display = "none";
    wrapContainer.style.opacity = "1";
    wrapContainer.style.pointerEvents = "auto";
}

// signup popup
const signUpButton = document.getElementById('homeToSignUp');
const signUpInHome = document.getElementById('homeSignUp');

signUpButton.addEventListener("click", function () {
    fadeBackground();
    callSignUpPopUp();
});
// show hidden <div>
function callSignUpPopUp () {
    signUpInHome.style.display = "flex";
}

//add event onclick for button "back" in popup-signUp in homepage
const homeSignUpBack = document.getElementById('homeSignUpBack');
homeSignUpBack.addEventListener("click", backSignUp);

// go back to homepage so DOMContentLoaded doesn't happen again
function backSignUp () {
    signUpInHome.style.display = "none";
    wrapContainer.style.opacity = "1";
    wrapContainer.style.pointerEvents = "auto";
}