/* js file done watching/following this youtube video https://www.youtube.com/watch?v=t-EMinSz_Tk */

// select all inputs
const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  // focus event listener listens for when user user clicks the input and blur when clicks outside
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});
