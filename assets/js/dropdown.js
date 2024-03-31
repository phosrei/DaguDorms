function toggleDropdown() {
    var dropdownMenu = document.getElementById("dropdown-menu");
    dropdownMenu.classList.toggle("open");
}

var closeButton = document.getElementById("close-button");
closeButton.addEventListener("click", toggleDropdown);