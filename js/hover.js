const element = document.querySelectorAll(".card_text");

element.addEventListener("mouseenter", function() {
  this.style.color = "red";
});

element.addEventListener("mouseleave", function() {
  this.style.color = "black";
});