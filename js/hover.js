/**
 * @pet-list.php
when the mouse is hovered over the card, make the card-text red
 */
const newColor = document.querySelectorAll(".card");
for (const color of newColor) {
    color.addEventListener("mouseover", () => {
        color.style.color = "red";
    });
    color.addEventListener("mouseout", () => {
        color.style.color = "black";
    });
}
