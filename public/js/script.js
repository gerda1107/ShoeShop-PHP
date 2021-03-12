// SIDE NAV

const slider = document.getElementById('slider')

slider.addEventListener('click', openNav)

function openNav() {
    document.getElementById("mySidenav").style.width = "400px";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}