$(document).ready(function () {
    // Inicializar Select2 para los selectores
    $('#inputInstitute').select2({
        placeholder: 'Buscar instituto...',
        ajax: {
            url: base_url + '/admin/institutos/getInstitutosSelect',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.nombre,
                            id: item.id
                        };
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 2
    });

    $('#inputCampus').select2({
        placeholder: 'Buscar campus...',
        ajax: {
            url: base_url + '/admin/campus/getCampusSelect',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.nombre,
                            id: item.id
                        };
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 2
    });

    // Controlar la visibilidad de los campos según el rol seleccionado
    $('#inputRol').on('change', function () {
        const rolSeleccionado = $(this).val();

        // Ocultar ambos contenedores primero
        $('#instituteContainer, #campusContainer').hide();

        // Dependiendo del rol, mostrar los campos correspondientes
        switch (rolSeleccionado) {
            case '2': // Supervisor
                $('#instituteContainer').show();
                // Limpiar los selects no usados
                $('#inputCampus').val(null).trigger('change');
                break;
            case '3': // Analista
            case '4': // Lector
                $('#campusContainer').show();
                // Limpiar los selects no usados
                $('#inputInstitute').val(null).trigger('change');
                break;
            default:
                // Si no hay selección o es otro valor, no mostrar nada
                $('#inputInstitute, #inputCampus').val(null).trigger('change');
                break;
        }
    });

    // Manejar el envío del formulario
    $('#agregarUsuarioForm').on('submit', function (e) {
        e.preventDefault();

        // Validar que los campos requeridos estén completos según el rol
        const rolSeleccionado = $('#inputRol').val();
        let formValido = true;

        if (rolSeleccionado === '2' && !$('#inputInstitute').val()) {
            alert('Por favor seleccione un instituto');
            formValido = false;
        }

        if ((rolSeleccionado === '3' || rolSeleccionado === '4') && !$('#inputCampus').val()) {
            alert('Por favor seleccione un campus');
            formValido = false;
        }

        if (formValido) {
            // Recopilar datos del formulario
            const formData = new FormData(this);

            // Obtener token CSRF
            const csrfName = document.getElementById("csrf_token_name").name;
            const csrfHash = document.getElementById("csrf_token_name").value;
            formData.append(csrfName, csrfHash); // Agregar CSRF token

            // Enviar datos al servidor usando fetch (como en tu código original)
            fetch(base_url + "admin/users/registro", {
                method: "POST",
                body: formData,
            })
                .then((response) => response.json())
                .then((data) => {
                    // Refrescar token CSRF después de la solicitud
                    refreshCsrfToken();

                    if (data.success) {
                        swal({
                            title: "¡Excelente!",
                            text: "¡El registro se realizó de manera exitosa!",
                            icon: "success",
                            timer: 1500,
                            buttons: false,
                        }).then(() => {
                            // Redirigir si es necesario
                            // window.location.href = base_url + "admin/users";
                        });
                    } else {
                        throw new Error(data.message || "La acción no se pudo realizar correctamente.");
                    }
                })
                .catch((error) => {
                    // Refrescar token CSRF incluso en caso de error
                    refreshCsrfToken();
                    console.error("Error al agregar el usuario:", error.message);
                    swal("¡Ups! Algo salió mal!", error.message, "error");
                });
        }
    });
});