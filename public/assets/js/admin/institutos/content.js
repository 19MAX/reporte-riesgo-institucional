document.addEventListener("DOMContentLoaded", async function () {
    // Inicializar DataTables
    var miTabla = $("#institutos").DataTable({
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
                    window.location.href = base_url + "admin/institutos/add";
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
                title: "Nombre del instituto",
                render: function (data, type, row) {
                    return `
                    <div class="d-flex align-items-center">
                        <img src="${base_url + "assets/uploads/logos/" +row.logo}" class="mr-2 rounded" style="width: 50px; height: auto;"
                            alt="Imagen">
                        <span>${row.nombre}</span>
                    </div>`;
                },
            },

            { data: "codigo", title: "Código" },
            { data: "provincia", title: "Provincia" },
            { data: "canton", title: "Cantón", visible: false },
            { data: "parroquia", title: "Parroquia", visible: false },
            { data: "acreditacion", title: "Acreditación" },
            { data: "region", title: "Region" },
            { data: "zona", title: "Zona" },
            {
                data: null,
                title: "Acciones",
                render: function (data, type, row) {
                    return `

                    <div class="d-flex">
                      <button type="button" class="btn btn-outline-warning m-1 btnEditar" title="Editar" data-id="${row.id}"><i class="far fa-edit"></i></button>

                      <button type="button" class="btn btn-outline-danger m-1 btnEliminar" title="Eliminar" data-id="${row.id}">
                        <i class="fas fa-trash-alt "></i>
                      </button>

                      <a href="${base_url}admin/sede/${row.id}" class="btn btn-outline-primary m-1" title="Sede">
                        <i class="fa fa-map-marker"></i>
                      </a>

                    </div>`;
                },
            },
        ],
    });


    // Manejador de eventos para el botón de editar
    $(document).on("click", ".btnEditar", function () {
        var rowData = miTabla.row($(this).closest("tr")).data();
        $("#Editar_datos").modal("show");
        document.getElementById("id_ies").value = rowData.id;
        document.getElementById("nombreInput").value = rowData.nombre;
        document.getElementById("codigoInput").value = rowData.codigo;
        document.getElementById("provinciaSelect").value = rowData.provincia;
        document.getElementById("cantonInput").value = rowData.canton;
        document.getElementById("parroquiaInput").value = rowData.parroquia;
        document.getElementById("direccionInput").value = rowData.direccion;
        document.getElementById("acreditacionInput").value = rowData.acreditacion;
        document.getElementById("regionInput").value = rowData.region;
        document.getElementById("zonaInput").value = rowData.zona;
    });


    // Manejador de eventos para el botón de eliminar
    $(document).on("click", ".btnEliminar", function () {
        var rowData = miTabla.row($(this).closest("tr")).data();
        $("#Eliminar").modal("show");
        document.getElementById("id_ies").value = rowData.id;
        document.getElementById("institutoName").value = rowData.nombre;

        // Escuchar el click en el botón de eliminación dentro del modal
        $(document).on("click", "#btn-delete", function () {
            //token
            const csrfName = document.getElementById("csrf_token_name").name;
            const csrfHash = document.getElementById("csrf_token_name").value;
            var formData = new FormData();
            formData.append("id", rowData.id);
            formData.append("nombre", rowData.nombre);
            formData.append(csrfName, csrfHash); // Agregar CSRF token

            fetch(base_url + "admin/institutos/deleteIes", {
                method: "POST",
                body: formData,
            })
                .then((response) => {
                    if (!response.ok) {
                        return response.json(); // Parsea la respuesta JSON
                    }

                    $("#Eliminar").modal("hide");
                    swal(
                        "En Hora Buena!",
                        "La acción se realizó de manera exitosa!",
                        "success"
                    );
                    reloadSection();
                })
                .then((data) => {
                    refreshCsrfToken();
                    if (data && data.error) {
                        // Si hay un error, muestra el mensaje de error
                        swal(
                            "Error",
                            data.error,
                            "error"
                        );
                    }
                })
                .catch((error) => {
                    refreshCsrfToken();
                    swal(
                        "Ups! Algo salio mal!",
                        "La acción no se pudo realizar correctamente!",
                        "error"
                    );
                    // setLoading(false);
                    console.error("Error al eliminar el instituto:", error);
                });
        });
    });

    document.getElementById("btnUpdate").addEventListener("click", function () {
        //     setLoading(true);
        update(); // Llama a la función update cuando se hace clic en el botón
    });
    // document.getElementById("btn-add").addEventListener("click", function () {
    //     //     setLoading(true);
    //     addSede(); // Llama a la función update cuando se hace clic en el botón
    // });


    function update() {
        try {
            const id = document.getElementById("id_ies").value;
            const nombre = document.getElementById("nombreInput").value;
            const codigo = document.getElementById("codigoInput").value;
            const provincia = document.getElementById("provinciaSelect").value;
            const canton = document.getElementById("cantonInput").value;
            const parroquia = document.getElementById("parroquiaInput").value;
            const direccion = document.getElementById("direccionInput").value;
            const acreditacion = document.getElementById("acreditacionInput").value;
            const region = document.getElementById("regionInput").value;
            const zona = document.getElementById("zonaInput").value;
            const logo = document.getElementById("logoInput").files[0];
            const csrfName = document.getElementById("csrf_token_name").name;
            const csrfHash = document.getElementById("csrf_token_name").value;
            const formData = new FormData();
            formData.append("nombre", nombre);
            formData.append("codigo", codigo);
            formData.append("provincia", provincia);
            formData.append("canton", canton);
            formData.append("parroquia", parroquia);
            formData.append("direccion", direccion);
            formData.append("acreditacion", acreditacion);
            formData.append("region", region);
            formData.append("zona", zona);
            formData.append("logo", logo);
            formData.append(csrfName, csrfHash);
            if (isNaN(codigo)) {
                swal("¡Ups!", "El código debe ser un número.", "error");
                return; // Salir de la función si el código no es un número
            }
            formData.append("id", id);
            fetch(base_url + "admin/institutos/updateIes", {
                method: "POST",
                body: formData,
            })
                .then((response) => {
                    if (!response.ok) {
                        return response.json().then((data) => {
                            let errorMessage = "La acción no se pudo realizar correctamente!";
                            if (data && data.errors) {
                                errorMessage = data.errors.join(", ");
                            } else if (data && data.error) {
                                errorMessage = data.error;
                            }
                            throw new Error(errorMessage);
                        });
                    }
                    return response.json(); // Parse the JSON response
                })
                .then((data) => {
                    refreshCsrfToken();
                    $("#Editar_datos").modal("hide");
                    swal({
                        title: "En Hora Buena!",
                        text: "La acción se realizó de manera exitosa!",
                        icon: "success",
                        timer: 1000,
                        buttons: false,
                    });
                    reloadSection();
                })
                .catch((error) => {
                    refreshCsrfToken();
                    console.error("Error al actualizar los datos:", error.message);
                    swal("Ups! Algo salió mal!", error.message, "error");
                });
        } catch (error) {
            refreshCsrfToken();
            console.error("Error al obtener los datos del formulario:", error);
            swal(
                "Ups! Algo salio mal!",
                "La accion no se pudo realizar correctamente!",
                "error"
            );
        }
    }

    function reloadSection() {
        try {
            fetch(base_url + "admin/institutos/getInstitutos").then(
                (response) => {
                    if (!response.ok) {
                        throw new Error(
                            "Hubo un problema al obtener los detalles de los institutos."
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
            console.error("Error al obtener los detalles del ocasion:", error);
        }
    }

    // Cargar los datos al cargar la página
    reloadSection();
});
