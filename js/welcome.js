/* when the user clicks on the button,
toggle between hiding and showing the dropdown content */
function toggleDropdown() {
    document.getElementById("areaDropdown").classList.toggle("show");
}

// close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.button-nav')) {
        let dropdowns = document.getElementsByClassName("dropdown-content");
        let i;
        for (i = 0; i < dropdowns.length; i++) {
            let openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
