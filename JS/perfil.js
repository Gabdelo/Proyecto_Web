
const navbarBoton = document.querySelector(".btn-nav");
const navbarList = document.querySelector(".nav-list");

        navbarBoton.addEventListener("click", () => {
        navbarBoton.classList.toggle("active");
        if (navbarList.classList.contains("active")) {
        navbarList.classList.remove("active");
        navbarList.classList.add("close");
        navbarList.addEventListener("animationend", function handler() {
          navbarList.classList.remove("close");
          navbarList.removeEventListener("animationend", handler);
    });
  } else {
    navbarList.classList.add("active");
  }
});
