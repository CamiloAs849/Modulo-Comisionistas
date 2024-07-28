document.addEventListener("keyup", e => {
  if (e.target.matches("#buscador")) {

    if (e.key === "Escape") e.target.value = ""

    document.querySelectorAll(".articulo").forEach(producto => {

      producto.textContent.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, "").includes(e.target.value.toLowerCase())
        ? producto.classList.remove("filtro")
        : producto.classList.add("filtro")
    });

  }

});
