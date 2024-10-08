// Tablas
$(document).ready(function () {
  $("#comisionistas").DataTable({
    scrollX: true,
    layout: {
      bottomEnd: {
        paging: {
          firstLast: false,
        },
      },
    },
    language: {
      processing: "",
      search: "<i class='fa-solid fa-magnifying-glass'></i> Buscar&nbsp;:",
      lengthMenu: "Agrupar de _MENU_ comisionistas",
      info: "Mostrando del comisionista _START_ al _END_ de un total de _TOTAL_ comisionistas",
      infoEmpty: "No existen datos.",
      infoFiltered: "(filtrado de _MAX_ comisionistas en total)",
      infoPostFix: "",
      loadingRecords: "Cargando...",
      zeroRecords: "No se encontraron comisionistas con tu busqueda",
      emptyTable: "No hay datos disponibles en la tabla.",
      paginate: {
        previous: "<i class='fa-solid fa-arrow-left'></i> Anterior",
        next: "Siguiente <i class='fa-solid fa-arrow-right'></i>",
      },
      aria: {
        sortAscending: ": active para ordenar la columna en orden ascendente",
        sortDescending: ": active para ordenar la columna en orden descendente",
      },
    },
    lengthMenu: [
      [5, 10, 25, -1],
      [5, 10, 25, "Todos"],
    ],
  });
});
$(document).ready(function () {
  $("#SolicitudComisionista").DataTable({
    scrollX: false,
    layout: {
      bottomEnd: {
        paging: {
          firstLast: false,
        },
      },
    },
    language: {
      processing: "Tratamiento en curso...",
      search: "<i class='fa-solid fa-magnifying-glass'></i> Buscar&nbsp;:",
      lengthMenu: "Agrupar de _MENU_ solicitudes",
      info: "Mostrando la solicitud _START_ al _END_ de un total de _TOTAL_ solicitudes",
      infoEmpty: "No existen datos.",
      infoFiltered: "(filtrado de _MAX_ solicitudes en total)",
      infoPostFix: "",
      loadingRecords: "Cargando...",
      zeroRecords: "No se encontraron solicitudes con tu busqueda",
      emptyTable: "No hay datos disponibles en la tabla.",
      paginate: {
        previous: "<i class='fa-solid fa-arrow-left'></i> Anterior",
        next: "Siguiente <i class='fa-solid fa-arrow-right'></i>",
      },
      aria: {
        sortAscending: ": active para ordenar la columna en orden ascendente",
        sortDescending: ": active para ordenar la columna en orden descendente",
      },
    },
    lengthMenu: [
      [5, 10, 25, -1],
      [5, 10, 25, "Todos"],
    ],
  });
});
$(document).ready(function () {
  $("#comisionTable ").DataTable({
    scrollX: true,
    layout: {
      bottomEnd: {
        paging: {
          firstLast: false,
        },
      },
    },

    language: {
      processing: "Tratamiento en curso...",
      search: "<i class='fa-solid fa-magnifying-glass'></i> Buscar&nbsp;:",
      lengthMenu: "Agrupar de _MENU_ comisionistas",
      info: "Mostrando del comisionista _START_ al _END_ de un total de _TOTAL_ comisionistas",
      infoEmpty: "No existen datos.",
      infoFiltered: "(filtrado de _MAX_ comisionistas en total)",
      infoPostFix: "",
      loadingRecords: "Cargando...",
      zeroRecords: "No se encontraron comisionistas con tu busqueda",
      emptyTable: "No hay datos disponibles en la tabla.",
      paginate: {
        previous: "<i class='fa-solid fa-arrow-left'></i> Anterior",
        next: "Siguiente <i class='fa-solid fa-arrow-right'></i>",
      },
      aria: {
        sortAscending: ": active para ordenar la columna en orden ascendente",
        sortDescending: ": active para ordenar la columna en orden descendente",
      },
    },
    lengthMenu: [
      [5, 10, 25, -1],
      [5, 10, 25, "Todos"],
    ],
  });
});

$(document).ready(function () {
  $("#proveedores ").DataTable({
    scrollX: true,
    layout: {
      bottomEnd: {
        paging: {
          firstLast: false,
        },
      },
    },
    language: {
      processing: "Tratamiento en curso...",
      search: "<i class='fa-solid fa-magnifying-glass'></i> Buscar&nbsp;:",
      lengthMenu: "Agrupar de _MENU_ proveedores",
      info: "Mostrando del proveedor _START_ al _END_ de un total de _TOTAL_ proveedores",
      infoEmpty: "No existen datos.",
      infoFiltered: "(filtrado de _MAX_ proveedores en total)",
      infoPostFix: "",
      loadingRecords: "Cargando...",
      zeroRecords: "No se encontraron proveedores con tu busqueda",
      emptyTable: "No hay datos disponibles en la tabla.",
      paginate: {
        previous: "<i class='fa-solid fa-arrow-left'></i> Anterior",
        next: "Siguiente <i class='fa-solid fa-arrow-right'></i>",
      },
    },
    lengthMenu: [
      [5, 10, 25, -1],
      [5, 10, 25, "Todos"],
    ],
  });
});

$(document).ready(function () {
  $("#historial").DataTable({
    scrollX: true,
    layout: {
      bottomEnd: {
        paging: {
          firstLast: false,
        },
      },
    },
    language: {
      processing: "Tratamiento en curso...",
      search: "<i class='fa-solid fa-magnifying-glass'></i> Buscar&nbsp;:",
      lengthMenu: "Agrupar de _MENU_ movimientos",
      info: "Mostrando del movimiento _START_ al _END_ de un total de _TOTAL_ movimientos",
      infoEmpty: "No existen datos.",
      infoFiltered: "(filtrado de _MAX_ movimientos en total)",
      infoPostFix: "",
      loadingRecords: "Cargando...",
      zeroRecords: "No se encontraron movimientos con tu busqueda",
      emptyTable: "No hay datos disponibles en la tabla.",
      paginate: {
        previous: "<i class='fa-solid fa-arrow-left'></i> Anterior",
        next: "Siguiente <i class='fa-solid fa-arrow-right'></i>",
      },
    },
    lengthMenu: [
      [10, 25, -1],
      [10, 25, "Todos"],
    ],
  });
});
$(document).ready(function () {
  $("#tablaProductos").DataTable({
    scrollX: true,
    layout: {
      bottomEnd: {
        paging: {
          firstLast: false,
        },
      },
    },
    language: {
      processing: "Tratamiento en curso...",
      search: "<i class='fa-solid fa-magnifying-glass'></i> Buscar&nbsp;:",
      lengthMenu: "Agrupar de _MENU_ productos",
      info: "Mostrando del producto _START_ al _END_ de un total de _TOTAL_ productos",
      infoEmpty: "No existen datos.",
      infoFiltered: "(filtrado de _MAX_ productos en total)",
      infoPostFix: "",
      loadingRecords: "Cargando...",
      zeroRecords: "No se encontraron productos con tu busqueda",
      emptyTable: "No hay datos disponibles en la tabla.",
      paginate: {
        previous: "<i class='fa-solid fa-arrow-left'></i> Anterior",
        next: "Siguiente <i class='fa-solid fa-arrow-right'></i>",
      },
    },
    lengthMenu: [
      [5, 10, 25, -1],
      [5, 10, 25, "Todos"],
    ],
  });
});

// Funciones de eliminar
function ConfirmDeleteCom(id, nombre) {
  Swal.fire({
    title: "¿Quieres eliminar el comisionista?",
    text: `${nombre}`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, eliminar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = `../Admin/Crud-comisionistas/delete.php?id=${id}`;
    }
  });
}
function ConfirmDeletePro(id, nombre) {
  Swal.fire({
    title: "¿Estás seguro de eliminar este proveedor?",
    text: `${nombre}`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, eliminar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = `../Admin/crud-proveedores/delete.php?id=${id}`;
    }
  });
}

function ConfirmReport() {
  Swal.fire({
    title: "¿Estás seguro de generar el reporte?",
    text: "Este proceso puede tardar unos minutos",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, generar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      window.open("../Reports/ReporteComision.php", "_blank");
    }
  });
}
