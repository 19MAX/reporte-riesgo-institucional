document.addEventListener("DOMContentLoaded", async function () {
    // Inicializar DataTables
    var miTabla = $("#fichas").DataTable({
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
                            // Verifica si la columna es la primera (índice 0) o tiene una clase específica
                            if (idx === 0 || dt.column(idx).nodes().to$().hasClass('clase-a-excluir')) {
                                return null; // Retorna null para excluir la columna de la lista
                            }
                            return (idx) + ': ' + title;
                        }
                    }
                ]
            },
            {
                text: '<i class="fa fa-lg fas fa-plus-circle"></i> Agregar',
                titleAttr: 'Agregar Instituto',
                className: 'bg-success rounded mb-1',
                action: function () {
                    window.location.href = "../main/index.php?modulo=selectUser";
                },
            },
        ],
        lengthMenu: [10, 25, 50, 100],
        columns: [
            {
                data: null,
                title: "",
                render: function (data, type, row) {
                    return `<div class="dtr-control"></div>`;
                },
            },
            {
                data: null,
                title: "Nombre del usuario",
                render: function (data, type, row) {
                    return `<span>${row.nombre_usuario}</span>`;
                },
            },

            { data: "nombre_ies", title: "Instituto", visible: true },
            { data: "nombre_sede", title: "Sede" },
            { data: "nombre_campus", title: "Campus" },
            {
                data: null,
                title: "Acciones",
                render: function (data, type, row) {
                    return `

                    <div class="d-flex">
                    <!-- <button type="button" class="btn btn-outline-warning m-1 btnEditar" title="Editar" data-id="${row.id_usuario}"><i class="far fa-edit"></i></button>-->

                      <a href="${base_url + "admin/fichas/"+row.id_ficha}" class="btn btn-outline-primary m-1" title="Reporte de la ficha">
                      <i class="fa-solid fa-chart-pie"></i>
                      </a>

                    </div>`;
                },
            },
        ],
    });

    function reloadSection() {
        try {
            fetch(base_url + "admin/fichas/getFichasAll").then(
                (response) => {
                    if (!response.ok) {
                        throw new Error(
                            "Hubo un problema al obtener los detalles de las Fichas."
                        );
                    }
                    response.json().then((data) => {
                        // Limpiar los datos existentes en la tabla
                        miTabla.clear().draw();
                        // Agregar los nuevos datos a la tabla
                        miTabla.rows.add(data).draw();
                    });
                    // setLoading(false);
                }
            );
        } catch (error) {
            console.error("Error al obtener los detalles de las Fichas:", error);
        }
    }

    // Cargar los datos al cargar la página
    reloadSection();
});
