// slide
let slideIndex = 1;
showSlide(slideIndex);
function PlusSlide(n) {
  showSlide((slideIndex += n));
}

function showSlide(n) {
  let i;
  let slide = document.querySelectorAll(".c");
  if (n > slide.length) {
    slideIndex = 1;
  } else if (n < 1) {
    slideIndex = slide.length;
  }
  for (i = 0; i < slide.length; i++) {
    slide[i].style.display = "none";
  }
  slide[slideIndex - 1].style.display = "block";
}
setInterval(() => {
  PlusSlide(1);
}, 6000);
// login open

// Update this feature later

// let loginBtn = document.querySelector(".heading-item_login")
// let modalLogin = document.querySelector(".modal-login")
// let closes = document.querySelector(".close-img")
// function openLogin(){
//     modalLogin.classList.remove("hidden")
// }
// function closeLogin(){
//     modalLogin.classList.add("hidden")
// }

// open login
// loginBtn.addEventListener("click", openLogin);

// closes.addEventListener("click", closeLogin);

// show pass

let inputPass = document.querySelector(".input-pass");
let butShow = document.querySelector(".input .show-pass");

butShow.addEventListener("click", () => {
  if (inputPass.type === "password") {
    inputPass.type = "text";
  } else {
    inputPass.type = "password";
  }
});

var menuItems = document.querySelectorAll('.heading-item a[href="#"]');
for (var i = 0; i < menuItems.length; i++) {
  var menuItem = menuItems[i];
  menuItem.addEventListener("click", function (event) {
    event.preventDefault();
    var targetId = this.getAttribute("href").substring(1);
    var targetElement = document.getElementById(targetId);
    if (targetElement) {
      window.scrollTo({
        top: targetElement.offsetTop - 200,
        behavior: "smooth",
      });
    }
  });
}

// sign up / login

var btnSign = document.getElementById("js-btn-sign");
var btnLogin = document.getElementById("js-btn-login");
var btnLogin_2 = document.getElementById("js-btn-login-2");
var siteLogin = document.getElementById("js-login");
var siteSign = document.getElementById("js-sign");

function showLogin() {
  siteSign.classList.add("hidden");
  siteLogin.classList.remove("hidden");
}
function showSign() {
  siteLogin.classList.add("hidden");
  siteSign.classList.remove("hidden");
}
btnSign.addEventListener("click", showLogin);
btnLogin.addEventListener("click", showSign);
btnLogin_2.addEventListener("click", showSign);

// show more

var btnMore = document.querySelector(".btn-more");
var ProductMore = document.querySelector(".content-events-list-height");
var textMore = document.querySelector(".btn-more p");

btnMore.addEventListener("click", () => {
  if (textMore.textContent == "Event Close") {
    ProductMore.classList.add("content-events-list-height");
    textMore.textContent = "Event More";
  } else if (textMore.textContent == "Event More") {
    ProductMore.classList.remove("content-events-list-height");
    textMore.textContent = "Event Close";
  }
});
