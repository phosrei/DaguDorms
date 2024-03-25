const imgSlider = () => {
    const imageList = document.querySelector(".image-carousel .image-list");
    const slideBtn = document.querySelectorAll(".image-carousel .slide-btn");

    slideBtn.forEach(button => {
        button.addEventListener("click", () => {
            const direction = button.id === "prev-img" ? -1 : 1;
            const scrollAmount = 1050 * direction;
            imageList.scrollBy({ left: scrollAmount, behavior: "smooth"});
        });
    });
}

window.addEventListener("load", imgSlider);