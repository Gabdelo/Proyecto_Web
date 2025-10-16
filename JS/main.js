
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


const contenedor = document.querySelector(".inicio-bolitas");
const cantidad = 40;
for (let i = 0; i < cantidad; i++) {
  const bola = document.createElement("span");
  bola.classList.add("bolitas");
  contenedor.appendChild(bola);
}
const bolitas = document.querySelectorAll(".bolitas");

bolitas.forEach((bola) => {
  const duracion = (Math.random() * 10 + 10).toFixed(2);
  bola.style.animationDuration = `${duracion}s`;
});
