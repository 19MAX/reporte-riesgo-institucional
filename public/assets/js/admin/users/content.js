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
            { targets: "exclude-view", visible: false },
            {
                className: "dtr-control bg-white",
                orderable: false,
                targets: 0,
            },
        ],
        colReorder: true,
        responsive: {
            details: {
                type: "column",
                target: "tr",
            },
        },
        dom: "Bfrtip",
        buttons: [
            {
                extend: "pageLength",
                className: "border border-secondary btn-light rounded mr-1 mb-1",
            },
            {
                extend: "collection",
                text: '<i class="fa fa-download"></i> Exportar',
                className: "border border-secondary btn-light rounded mr-1 mb-1",
                buttons: [
                    {
                        extend: "copyHtml5",
                        text: '<i class="fas fa-copy text-info"></i> Copiar',
                        titleAttr: "Copiar",
                    },
                    {
                        extend: "excelHtml5",
                        text: '<i class="fas fa-file-excel text-success"></i> Excel',
                        titleAttr: "Excel",
                    },
                    {
                        extend: "csvHtml5",
                        text: '<i class="fas fa-file-csv text-primary"></i> CSV',
                        titleAttr: "CSV",
                    },
                    {
                        extend: "pdfHtml5",
                        text: '<i class="fas fa-file-pdf text-danger"></i> PDF',
                        titleAttr: "PDF",
                    },
                    {
                        extend: "colvis",
                        text: "Columnas visibles",
                        columnText: function (dt, idx, title) {
                            // Verifica si la columna es la primera (índice 0) o tiene una clase específica
                            if (
                                idx === 0 ||
                                dt.column(idx).nodes().to$().hasClass("clase-a-excluir")
                            ) {
                                return null; // Retorna null para excluir la columna de la lista
                            }
                            return idx + ": " + title;
                        },
                    },
                ],
            },
            {
                text: '<i class="fa fa-lg fas fa-plus-circle"></i> Agregar',
                titleAttr: "Agregar usuario",
                className: "bg-success rounded mb-1",
                action: function () {
                    window.location.href = base_url + "admin/users/add";
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
            { data: "cedula", title: "Cédula" },
            {
                data: null,
                title: "Nombres",
                render: function (data, type, row) {
                    return `
                    <div class="d-flex align-items-center">
                        <span id="nombres" class="mr-2">${row.nombres}</span>
                        <span id="apellidos">${row.apellidos}</span>
                    </div>`;
                },
            },

            { data: "email", title: "Correo electrónico" },
            { data: "rol", title: "Rol" },
            {
                data: null,
                title: "Acciones",
                render: function (data, type, row) {
                    let buttons = `
                    <div class="d-flex">
                      <button type="button" class="btn btn-outline-warning m-1 btnEditar" title="Editar" data-id="${row.id}">
                        <i class="far fa-edit"></i>
                      </button>

                      <button type="button" class="btn btn-outline-danger m-1 btnEliminar" title="Eliminar" data-id="${row.id}">
                        <i class="fas fa-trash-alt"></i>
                      </button>

                      <button type="button" class="btn btn-outline-primary m-1 btnActualizarPassword" title="Recuperar Contraseña" data-id="${row.id}">
                        <i class="fa-solid fa-key"></i>
                      </button>
                    `;

                    if (row.id_campus === "" && row.rol === 3) {
                        // Verificar si id_campus es nulo o vacío
                        buttons += `
                          <button type="button" class="btn btn-outline-success m-1 btnAsignarCampus" title="Asignar Campus" data-id="${row.id}">
                            <i class="fas fa-university"></i>
                          </button>
                        `;
                    }

                    buttons += `</div>`;
                    return buttons;
                },
            },
        ],
    });

    // Manejar el clic del botón Asignar Campus
    $("#institutos").on("click", ".btnAsignarCampus", function () {
        const userId = $(this).data("id");
        window.location.href = `../main/index.php?modulo=asignarCampus&user_id=${userId}`; // Cambia esta ruta a la ruta de tu nueva vista
    });

    // Manejador de eventos para el botón de editar
    $(document).on("click", ".btnEditar", function () {
        var rowData = miTabla.row($(this).closest("tr")).data();
        $("#Editar_datos").modal("show");
        document.getElementById("id_user").value = rowData.id;
        document.getElementById("cedula").value = rowData.cedula;
        document.getElementById("inputNombres").value = rowData.nombres;
        document.getElementById("inputApellidos").value = rowData.apellidos;
        document.getElementById("email").value = rowData.email;
        document.getElementById("rol").value = rowData.rol;
    });

    // Manejador de eventos para el botón de eliminar
    $(document).on("click", ".btnEliminar", function () {
        var rowData = miTabla.row($(this).closest("tr")).data();
        $("#Eliminar").modal("show");
        document.getElementById("id_usuario").value = rowData.id;
        document.getElementById("user_name").value =
            rowData.nombres + " " + rowData.apellidos;

        // Escuchar el click en el botón de eliminación dentro del modal
        $(document).on("click", "#btn-delete", function () {
            //token
            const csrfName = document.getElementById("csrf_token_name").name;
            const csrfHash = document.getElementById("csrf_token_name").value;
            var formData = new FormData();
            formData.append("id", rowData.id);
            formData.append("nombre", rowData.nombre);
            formData.append(csrfName, csrfHash); // Agregar CSRF token

            fetch(base_url + "admin/users/deleteUser", {
                method: "POST",
                body: formData,
            })
                .then((response) => {
                    if (!response.ok) {
                        return response.json().then((data) => {
                            let errorMessage = "La acción no se pudo realizar correctamente!";
                            if (data && data.error) {
                                errorMessage = data.error;
                            }
                            throw new Error(errorMessage);
                        });
                    }
                    return response.json(); // Parse the JSON response
                })
                .then((data) => {
                    if (data && data.success) {
                        $("#Eliminar").modal("hide");
                        swal({
                            title: "¡En Hora Buena!",
                            text: "¡La acción se realizó de manera exitosa!",
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                        });
                        reloadSection();
                    }
                })
                .catch((error) => {
                    refreshCsrfToken();
                    console.error("Error eliminando al usuario:", error.message);
                    swal("¡Ups! Algo salió mal!", error.message, "error");
                });
        });
    });

    // Manejador de eventos para el botón de actualizar contraseña
    $(document).on("click", ".btnActualizarPassword", function () {
        var rowData = miTabla.row($(this).closest("tr")).data();
        $("#ActualizarPassword").modal("show");
        document.getElementById("id_user_password").value = rowData.id;
        document.getElementById("user_name_password").value = rowData.nombres + " " + rowData.apellidos;
    });


    // Botón para ejecutar la actualización de contraseña
    document.getElementById("btnUpdatePassword").addEventListener("click", function () {
        updatePassword();
    });

    document.getElementById("btnUpdate").addEventListener("click", function () {
        //     setLoading(true);
        update(); // Llama a la función update cuando se hace clic en el botón
    });


    function update() {
        try {
            const id = document.getElementById("id_user").value;
            const cedula = document.getElementById("cedula").value;
            const nombres = document.getElementById("inputNombres").value;
            const apellidos = document.getElementById("inputApellidos").value;
            const email = document.getElementById("email").value;
            const rol = document.getElementById("rol").value;

            // Obtener CSRF token desde el input oculto
            const csrfName = document.getElementById("csrf_token_name").name;
            const csrfHash = document.getElementById("csrf_token_name").value;

            const formData = new FormData();
            formData.append("cedula", cedula);
            formData.append("nombres", nombres);
            formData.append("apellidos", apellidos);
            formData.append("email", email);
            formData.append("rol", rol);
            formData.append("id", id);
            formData.append(csrfName, csrfHash); // Agregar CSRF token

            fetch(base_url + "admin/users/updateUser", {
                method: "POST",
                body: formData,
            })
                .then((response) => {
                    // Continuamos con el manejo de la respuesta original
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
                    return response.json();
                })
                .then((data) => {
                    // Ya no es necesario actualizar el token CSRF aquí porque ya lo hicimos antes
                    if (data.success) {
                        $("#Editar_datos").modal("hide");
                        swal({
                            title: "¡En Hora Buena!",
                            text: data.message,
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                        }).then(() => {
                            // Recargar la sección después de que se cierre el modal
                            reloadSection();
                        });
                    }
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
            console.error(
                "No se pudo refrescar el token CSRF después del error:",
                tokenError
            );
        }
    }

    // Función para actualizar la contraseña
    function updatePassword() {
        try {
            const id = document.getElementById("id_user_password").value;
            const newPassword = document.getElementById("newPassword").value;
            const confirmPassword = document.getElementById("confirmPassword").value;

            // Validación básica
            if (newPassword !== confirmPassword) {
                swal("Error", "Las contraseñas no coinciden", "error");
                return;
            }

            if (newPassword.length < 6) {
                swal("Error", "La contraseña debe tener al menos 6 caracteres", "error");
                return;
            }

            // Obtener token
            const csrfName = document.getElementById("csrf_token_name").name;
            const csrfHash = document.getElementById("csrf_token_name").value;

            const formData = new FormData();
            formData.append("id", id);
            formData.append("newPassword", newPassword);
            formData.append(csrfName, csrfHash); // Agregar CSRF token

            fetch(base_url + "admin/users/updatePassword", {
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
                    return response.json();
                })
                .then((data) => {
                    if (data.success) {
                        $("#ActualizarPassword").modal("hide");
                        swal({
                            title: "¡En Hora Buena!",
                            text: data.message || "Contraseña actualizada con éxito",
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                        });
                        // Limpiar campos
                        document.getElementById("newPassword").value = "";
                        document.getElementById("confirmPassword").value = "";
                        reloadSection();
                    }
                })
                .catch((error) => {
                    refreshCsrfToken();
                    console.error("Error al actualizar la contraseña:", error.message);
                    swal("¡Ups! Algo salió mal!", error.message, "error");
                });
        } catch (error) {
            refreshCsrfToken();
            console.error("Error al obtener los datos del formulario:", error);
            swal(
                "¡Ups! Algo salió mal!",
                "La acción no se pudo realizar correctamente!",
                "error"
            );
        }
    }

    function reloadSection() {
        try {
            fetch(base_url + "admin/users/getAllUsersWithoutPassword")
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(
                            "Hubo un problema al obtener los detalles de los usuarios."
                        );
                    }
                    return response.json();
                })
                .then((data) => {
                    // Limpiar y actualizar la tabla
                    miTabla.clear();

                    if (Array.isArray(data) && data.length > 0) {
                        miTabla.rows.add(data);
                    }

                    miTabla.draw();

                    // Refrescar el token CSRF después de actualizar la tabla
                    return refreshCsrfToken();
                })
                .catch((error) => {
                    console.error("Error al obtener los datos:", error);
                    swal("Error", "No se pudieron cargar los datos de usuarios", "error");

                    // Intentar refrescar el token incluso en caso de error
                    refreshCsrfToken().catch((tokenError) => {
                        console.error(
                            "No se pudo refrescar el token CSRF después del error:",
                            tokenError
                        );
                    });
                });
        } catch (error) {
            console.error("Error al obtener los detalles del usuario:", error);

            // Intentar refrescar el token incluso en caso de error
            refreshCsrfToken().catch((tokenError) => {
                console.error(
                    "No se pudo refrescar el token CSRF después del error:",
                    tokenError
                );
            });
        }
    }

    // Cargar los datos al cargar la página
    reloadSection();
});
