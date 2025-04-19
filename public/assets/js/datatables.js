$(document).ready(function () {

    $("#users").DataTable({
        columnDefs: [
            { targets: 'exclude-view', visible: false },
            {
                className: 'dtr-control bg-white',
                orderable: false,
                targets: 0
            }
        ],
        order: [1, 'asc'],
        initComplete: function () {
            // Mostrar la tabla después de que DataTables se haya inicializado
            $(this).removeClass('d-none');
            // Redimensionar las columnas para que sean responsive
            var table = $(this).DataTable();
        },
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
        colReorder: true,
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        dom: "Bfrtip" ,
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
                        text: '<i class="fa fa-files-o text-info"></i> Copiar',
                        titleAttr: 'Copiar'
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel-o text-success"></i> Excel',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fa fa-file-text-o text-primary"></i> CSV',
                        titleAttr: 'CSV'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf-o text-danger"></i> PDF',
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
                titleAttr: 'Agregar',
                className: 'bg-success rounded mb-1',
                action: function () {
                    window.location.href = usersCreate;
                },
            },
            {
                text: '<i class="fa-lg fas fa-trash-restore"></i><p class="tooltip-text">Eliminados</p>',
                className: 'd-none',

                action: function () {
                    $("#createEventModal").modal("show");
                },
            },
        ],
        lengthMenu: [10, 25, 50, 100]
    });
    $("#institutos").DataTable({
        columnDefs: [
            { targets: 'exclude-view', visible: false },
            {
                className: 'dtr-control bg-white',
                orderable: false,
                targets: 0
            }
        ],
        order: [1, 'asc'],
        initComplete: function () {
            // Mostrar la tabla después de que DataTables se haya inicializado
            $(this).removeClass('d-none');
            // Redimensionar las columnas para que sean responsive
            var table = $(this).DataTable();
        },
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
        colReorder: true,
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        dom: "Bfrtip" ,
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
                        text: '<i class="fa fa-files-o text-info"></i> Copiar',
                        titleAttr: 'Copiar'
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel-o text-success"></i> Excel',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fa fa-file-text-o text-primary"></i> CSV',
                        titleAttr: 'CSV'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf-o text-danger"></i> PDF',
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
                    window.location.href = iesCreate;
                },
            },
            {
                text: '<i class="fa-lg fas fa-trash-restore"></i><p class="tooltip-text">Eliminados</p>',
                className: 'd-none',
                action: function () {
                    $("#createEventModal").modal("show");
                },
            },
        ],
        lengthMenu: [10, 25, 50, 100]
    });
    $("#sede").DataTable({
        columnDefs: [
            { targets: 'exclude-view', visible: false },
            {
                className: 'dtr-control bg-white',
                orderable: false,
                targets: 0
            }
        ],
        order: [1, 'asc'],
        initComplete: function () {
            // Mostrar la tabla después de que DataTables se haya inicializado
            $(this).removeClass('d-none');
            // Redimensionar las columnas para que sean responsive
            var table = $(this).DataTable();
        },
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
        colReorder: true,
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        dom: "Bfrtip" ,
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
                        text: '<i class="fa fa-files-o text-info"></i> Copiar',
                        titleAttr: 'Copiar'
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel-o text-success"></i> Excel',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fa fa-file-text-o text-primary"></i> CSV',
                        titleAttr: 'CSV'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf-o text-danger"></i> PDF',
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
            }
        ],
        lengthMenu: [10, 25, 50, 100]
    });
    $("#campus").DataTable({
        columnDefs: [
            { targets: 'exclude-view', visible: false },
            {
                className: 'dtr-control bg-white',
                orderable: false,
                targets: 0
            }
        ],
        order: [1, 'asc'],
        initComplete: function () {
            // Mostrar la tabla después de que DataTables se haya inicializado
            $(this).removeClass('d-none');
            // Redimensionar las columnas para que sean responsive
            var table = $(this).DataTable();
        },
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
        colReorder: true,
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        dom: "Bfrtip" ,
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
                        text: '<i class="fa fa-files-o text-info"></i> Copiar',
                        titleAttr: 'Copiar'
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel-o text-success"></i> Excel',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fa fa-file-text-o text-primary"></i> CSV',
                        titleAttr: 'CSV'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf-o text-danger"></i> PDF',
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
            }
        ],
        lengthMenu: [10, 25, 50, 100]
    });

});