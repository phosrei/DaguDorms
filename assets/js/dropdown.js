function toggleDropdown() {
    var dropdownMenu = document.getElementById("dropdown-menu");
    var overlay = document.getElementById("overlay");

    dropdownMenu.classList.toggle("open");

    if (dropdownMenu.classList.contains("open")) {
        overlay.style.display = "block";
    } else {
        overlay.style.display = "none";
    }
}

var closeButton = document.getElementById("close-button");
closeButton.addEventListener("click", toggleDropdown);

document.getElementById('dropdown-button').addEventListener('click', toggleDropdown);

overlay.addEventListener('click', toggleDropdown);