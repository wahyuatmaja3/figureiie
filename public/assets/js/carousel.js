let sliderContainer = document.getElementById("sliderContainer");
let slider = document.getElementById("slider");
let cards = slider.getElementsByTagName("li");

let sliderContainerWidth = sliderContainer.clientWidth;
let elementToShow = 3;

let cardWidth = sliderContainerWidth / elementToShow;

slider.style.width = cards.length * cardWidth + "px";

for (let index = 0; index < cards.length; index++) {
    const element = card[index];
    element.style.width = cardWidth + "px";
}

function prev() {
    console.log(+slider.style.marginLeft.slice(0, -2));
    console.log(-cardWidth * (cards.length - elementToShow));
    if (
        +slider.style.marginLeft.slice(0, -2) !=
        -cardWidth * (cards.length - elementToShow)
    )
        slider.style.marginLeft =
            +slider.style.marginLeft.slice(0, -2) - cardWidth + "px";
}

function next() {
    if (+slider.style.marginLeft.slice(0, -2) != 0) {
        slider.style.marginLeft =
            +slider.style.marginLeft.slice(0, -2) + cardWidth + "px";
    }
}
