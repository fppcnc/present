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
    setTimeout(function() {
        let text = document.getElementById("homeText1");
        text.classList.add("visible");
    }, 5000);
    setTimeout(function() {
        let text = document.getElementById("homeText2");
        text.classList.add("visible");
    }, 6000);
});