document.addEventListener("DOMContentLoaded", function () {
    // Inicializar DataTables con los datos que ya están en el HTML
    var miTabla = $("#sede").DataTable({
        language: {
            buttons: {
                sLengthMenu: "Mostrar _MENU_ resultados",
                pageLength: {
                    _: "Mostrar %d resultados",
                },
            },
            zeroRecords: "No hay coincidencias",
            info: "Mostrando _END_ resultados de _MAX_",
            infoEmpty: "No hay datos disponibles",
            infoFiltered: "(Filtrado de _MAX_ registros totales)",
            search: '<i class="fa fa-search"></i>',
            emptyTable: "No existen registros",
            paginate: {
                first: "Primero",
                previous: "Anterior",
                next: "Siguiente",
                last: "Último",
            },
        },
        columnDefs: [
            { targets: 'exclude-view', visible: false },
            {
                className: 'dtr-control bg-white',
                orderable: false,
                targets: 0
            }
        ],
        colReorder: true,
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        dom: "Bfrtip",
        buttons: [
            {
                extend: "pageLength",
                className: "border border-secondary btn-light rounded mr-1 mb-1",
            },
            {
                extend: 'collection',
                text: '<i class="fa fa-download"></i> Exportar',
                className: "border border-secondary btn-light rounded mr-1 mb-1",
                buttons: [
                    {
                        extend: 'copyHtml5',
                        text: '<i class="fas fa-copy text-info"></i> Copiar',
                        titleAttr: 'Copiar'
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel text-success"></i> Excel',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fas fa-file-csv text-primary"></i> CSV',
                        titleAttr: 'CSV'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf text-danger"></i> PDF',
                        titleAttr: 'PDF'
                    },
                    {
                        extend: 'colvis',
                        text: 'Columnas visibles',
                        columnText: function (dt, idx, title) {
                            if (idx === 0 || dt.column(idx).nodes().to$().hasClass('clase-a-excluir')) {
                                return null;
                            }
                            return (idx) + ': ' + title;
                        }
                    }
                ]
            },
            {
                text: '<i class="fa fa-lg fas fa-plus-circle"></i> Agregar',
                titleAttr: 'Agregar Sede',
                className: 'bg-success rounded mb-1 mr-1',
                action: function () {
                    $('#agregarSede').modal('show');
                },
            },
            {
                text: '<i class="fa-solid fa-arrow-left"></i> Regresar',
                titleAttr: 'Regresar a las sedes',
                className: 'bg-dark rounded mb-1',
                action: function () {
                    window.location.href = base_url + "admin/institutos";
                },
            },
        ],
        lengthMenu: [10, 25, 50, 100],
    });

    // Manejador para el botón de agregar campus
    $(document).on("click", ".btnCampus", function () {
        var sedeId = $(this).data('id');
        $("#agregarCampus").modal("show");
        // Aquí puedes setear valores en el modal si es necesario
    });

    // Manejador para el botón de editar
    $(document).on("click", ".btnEditar", function () {
        var sedeId = $(this).data('id');
        var nombre = $(this).data('nombre');
        var direccion = $(this).data('direccion');

        // Cargar los datos en el modal de editar
        $("#Editar_datos #id_sede").val(sedeId);
        $("#Editar_datos #nombreInput").val(nombre);
        $("#Editar_datos #direccionSede").val(direccion);

        $("#Editar_datos").modal("show");
    });

    // Manejador para el botón de eliminar
    $(document).on("click", ".btnEliminar", function () {
        var sedeId = $(this).data('id');
        var nombre = $(this).data('nombre');

        // Cargar los datos en el modal de eliminar
        $("#Eliminar #id_sede").val(sedeId);
        $("#Eliminar #sedeName").val(nombre);

        $("#Eliminar").modal("show");
    });

    // Botón para agregar sede (solo abre el modal)
    document.getElementById("btn-add").addEventListener("click", function () {
        // No hace nada más que mostrar el modal
        // La lógica de agregar deberá manejarse en tu backend
    });
});