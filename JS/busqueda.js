document.addEventListener("keyup", e => {
  if (e.target.matches("#buscador")) {

    if (e.key === "Escape") e.target.value = "";

    let status = false;

    document.querySelectorAll(".articulo").forEach(producto => {
      if (producto.textContent.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, "").includes(e.target.value.toLowerCase())) {
        producto.classList.remove("filtro");
        status = true;
      } else {
        producto.classList.add("filtro");
      }
    });

    if (status === false) {
      document.querySelector("#noResult").classList.remove("filtro");
    } else {
      document.querySelector("#noResult").classList.add("filtro");
    }
  }
});

