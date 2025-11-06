
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


const contenedor = document.querySelector(".inicio-bolitas");
const cantidad = 40;

for (let i = 0; i < cantidad; i++) {
  const bola = document.createElement("span");
  bola.classList.add("bolita");
  contenedor.appendChild(bola);
}

const bolitas = document.querySelectorAll(".bolita"); 

bolitas.forEach((bola) => {
  const duracion = (Math.random() * 15 + 10).toFixed(2); 
  bola.style.animationDuration = `${duracion}s`;

  const delay = (Math.random() * 2).toFixed(2);
  bola.style.animationDelay = `${delay}s`;
});
    
document.getElementById("BotonEmpresa").addEventListener("click", function(){
  window.location.href ="InicioSesionEmpresa.html?tipo=empresa";
});

document.getElementById("BotonVisitante").addEventListener("click", function(){
  window.location.href ="InicioSesionEmpresa.html?tipo=visitante";
});

document.getElementById("iniciar").addEventListener("click", function(){
  window.location.href= "InicioSesionEmpresa.html?tipo=inicioGeneral";
});
      
 