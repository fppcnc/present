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
}
// show hidden <div>
function callLoginPopUp () {
    loginInHome.style.display = "flex";
}

//add event onclick for button "back" in popup-login in homepage
const homeBack = document.getElementById('homeBack');

homeBack.addEventListener("click", back);

// go back to homepage but skip DOMContentLoaded
function back () {
    loginInHome.style.display = "none";
    wrapContainer.style.opacity = "1";
}