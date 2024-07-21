// Tablas
$(document).ready(function () {
  $(document).ready(function () {
    $("#comisionistas ").DataTable({
      language: {
        processing: "Tratamiento en curso...",
        search: "Buscar&nbsp;:",
        lengthMenu: "Agrupar de _MENU_ comisionistas",
        info: "Mostrando del proveedor _START_ al _END_ de un total de _TOTAL_ comisionistas",
        infoEmpty: "No existen datos.",
        infoFiltered: "(filtrado de _MAX_ elementos en total)",
        infoPostFix: "",
        loadingRecords: "Cargando...",
        zeroRecords: "No se encontraron comisionistas con tu busqueda",
        emptyTable: "No hay datos disponibles en la tabla.",
        paginate: {
          first: "Primero",
          previous: "Anterior",
          next: "Siguiente",
          last: "Ultimo",
        },
        aria: {
          sortAscending: ": active para ordenar la columna en orden ascendente",
          sortDescending:
            ": active para ordenar la columna en orden descendente",
        },
      },
      scrollY: 750,
      lengthMenu: [
        [10, 25, -1],
        [10, 25, "All"],
      ],
    });
  });
});

$(document).ready(function () {
  $(document).ready(function () {
    $("#proveedores ").DataTable({
      language: {
        processing: "Tratamiento en curso...",
        search: "Buscar&nbsp;:",
        lengthMenu: "Agrupar de _MENU_ proveedores",
        info: "Mostrando del proveedor _START_ al _END_ de un total de _TOTAL_ proveedores",
        infoEmpty: "No existen datos.",
        infoFiltered: "(filtrado de _MAX_ elementos en total)",
        infoPostFix: "",
        loadingRecords: "Cargando...",
        zeroRecords: "No se encontraron proveedores con tu busqueda",
        emptyTable: "No hay datos disponibles en la tabla.",
        paginate: {
          first: "Primero",
          previous: "Anterior",
          next: "Siguiente",
          last: "Ultimo",
        },
      },
      scrollY: 750,
      lengthMenu: [
        [10, 25, -1],
        [10, 25, "All"],
      ],
    });
  });
});
// Funciones de eliminar
function ConfirmDeleteCom(id) {
  Swal.fire({
    title: "¿Quieres eliminar el comisionista?",
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
function ConfirmDeletePro(id) {
  Swal.fire({
    title: "¿Estás seguro de eliminar este proveedor?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = `../Admin/crud-proveedores/delete.php?id=${id}`;
    }
  });
}
