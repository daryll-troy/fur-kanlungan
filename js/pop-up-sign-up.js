const container = document.getElementById("register");
const blurry = document.getElementById("blur-sapin");

// open the sign up form
function openForm() {
  container.style.display = "block";
  blurry.style.display = "block";
  container.style.animation = "fadeIn 0.3s";
  blurry.style.animation = "fadeIn 0.3s";
  
  // add the height of .blur-sapin
  const limit = Math.max(document.body.scrollHeight, document.body.offsetHeight,
    document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight);
  blurry.style.height = limit + "px";


  // change the height of .blur-sapin as window resizes
  window.addEventListener("resize", () => {
    blurry.style.height = "0px";
    const limit = Math.max(document.body.scrollHeight, document.body.offsetHeight,
      document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight);
    blurry.style.height = limit + "px";

  })

  window.scrollTo(0, 0);
}
// close the signup form when the sign in link is clicked
function closeForm() {
  // fadeout animation when sign in link is clicked
  container.style.animation = "fadeOut 0.8s";
  blurry.style.animation = "fadeOut 0.8s";

  setTimeout(() => {
    blurry.style.display = "none";
    container.style.display = "none";
  }, 800);

  
}
// when the background is clicked, exit the sign up form
blurry.addEventListener("click", () => {
   // fadeout animation when .blurry-sapin is clicked
  container.style.animation = "fadeOut 0.3s";
  blurry.style.animation = "fadeOut 0.3s";

  setTimeout(() => {
    blurry.style.display = "none";
    container.style.display = "none";
  }, 300);
  
  window.scrollTo(0, 0);
});




