function toggleDropdown() {
    var dropdownMenu = document.getElementById("dropdown-menu");

    dropdownMenu.classList.toggle("open");

    if (dropdownMenu.classList.contains("open")) {
        overlay.style.display = "block";
    } else {
        overlay.style.display = "none";
    }
}

function toggleFilters() {
    var filtersContainer = document.getElementById("filters-container");

    filtersContainer.classList.toggle("open");

    if (filtersContainer.classList.contains("open")) {
        overlay.style.display = "block";
    } else {
        overlay.style.display = "none";
    }
}

function checkOverlay() {
    var dropdownMenu = document.getElementById("dropdown-menu");
    var filtersContainer = document.getElementById("filters-container");

    if (dropdownMenu) {
        dropdownMenu.classList.remove("open");
    }

    if (filtersContainer) {
        filtersContainer.classList.remove("open");
    }

    overlay.style.display = "none";
}
var closeButton = document.getElementById("close-button");
var overlay = document.getElementById("overlay");
closeButton.addEventListener("click", toggleDropdown);
overlay.addEventListener('click', checkOverlay);

document.getElementById('dropdown-button').addEventListener('click', toggleDropdown);
document.getElementById('filters-button').addEventListener('click', toggleFilters);