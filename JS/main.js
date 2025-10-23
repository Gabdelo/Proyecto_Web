
const navbarBoton = document.querySelector(".btn-nav");
const navbarList = document.querySelector(".nav-list");
const btnplay = document.querySelector(".play");
const videoCont = document.querySelector(".v2");
const video = document.querySelector(".video");

btnplay.addEventListener("click", () =>{
 videoCont.classList.toggle("oculto");
 btnplay.classList.toggle("oculto");
 video.src += "?autoplay=1";
});

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

const navbar = document.querySelector('.nav-content');
    let timeout;

    function mostrarNavbar() {
      navbar.classList.remove('hidden');
      clearTimeout(timeout);
      timeout = setTimeout(() => {
        navbar.classList.add('hidden');
      }, 2000); // 3 segundos sin interacción
    }

    // Detectar interacción
    //window.addEventListener('mousemove', mostrarNavbar);
    //window.addEventListener('scroll', mostrarNavbar);
    //window.addEventListener('keydown', mostrarNavbar);

    // Iniciar temporizador al cargar
    //mostrarNavbar();
