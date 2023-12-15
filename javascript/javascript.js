let menuAberto = false; 

document.getElementById("butaomenu").addEventListener("click", function() {
    const menuSidebar = document.getElementById("menuSidebar");
    if (menuAberto) {
        menuSidebar.style.left = "-10rem"; 
    } else {
        menuSidebar.style.top = "6rem";
        menuSidebar.style.left = "0";
    }
    menuAberto = !menuAberto;
});

function ajustarAlturaSidebar() {
    const menuSidebar = document.getElementById("menuSidebar");

    const alturaConteudo = document.querySelector(".content").offsetHeight;
    const alturaViewport = window.innerHeight;
    const alturaMinima = Math.max(alturaConteudo, alturaViewport);

    menuSidebar.style.height = alturaMinima + "px";
    footer.style.height = alturaMinima + "px";
}

window.addEventListener("load", ajustarAlturaSidebar);
window.addEventListener("scroll", ajustarAlturaSidebar);
window.addEventListener("resize", ajustarAlturaSidebar);

