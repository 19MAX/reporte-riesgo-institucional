document.addEventListener("DOMContentLoaded", function () {
    // Inicializar Select2 con configuración mejorada
    $('#user_campus').select2({
        placeholder: 'Buscar campus o analista...',
        allowClear: true,
        minimumInputLength: 2,
        dropdownParent: $('#contenedorCampus'),
        width: '100%',
        language: {
            inputTooShort: function () {
                return "Ingresa al menos dos caracteres para buscar";
            },
            noResults: function () {
                return "No se encontraron resultados";
            },
            searching: function () {
                return "Buscando...";
            }
        },
        ajax: {
            url: base_url + 'admin/fichas/getCampus',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term,
                    page: params.page || 1
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;

                return {
                    results: data.items.map(function (campus) {
                        // Obtener información del primer analista (si existe)
                        const analista = campus.usuarios && campus.usuarios.length > 0
                            ? campus.usuarios[0]
                            : null;

                        return {
                            id: campus.id,
                            text: campus.nombre,
                            canton: campus.canton,
                            parroquia: campus.parroquia,
                            analista: analista,
                            analistaId: analista ? analista.id : null,
                            analistaNombre: analista ? analista.nombre_completo : 'Sin analista asignado'

                        };
                    }),
                    pagination: {
                        more: (params.page * 10) < data.total_count
                    }
                };
            },
            cache: true
        },
        templateResult: formatCampusResult,
        templateSelection: formatCampusSelection
    });

    // Función para formatear cómo se muestran los resultados de búsqueda
    function formatCampusResult(campus) {
        if (campus.loading) {
            return campus.text;
        }

        if (!campus.id) {
            return campus.text;
        }

        var analistaHtml = campus.analista
            ? '<div class="analista-info">Analista: <span class="analista-name">' + campus.analistaNombre + '</span></div>'
            : '<div class="analista-info"><span class="no-analista">Sin analista asignado</span></div>';

        var $container = $(
            '<div class="campus-result">' +
            '<div class="campus-name">' + campus.text + '</div>' +
            analistaHtml +
            '</div>'
        );

        return $container;
    }

    // Función para formatear cómo se muestra el campus seleccionado
    function formatCampusSelection(campus) {
        if (!campus.id) {
            return campus.text;
        }

        // Mostrar campus y analista en la selección
        return campus.text + ' - ' + (campus.analistaNombre || 'Sin analista');
    }

    // Listener para el botón de proceder
    document.getElementById("btnCampus").addEventListener("click", function () {
        const idCampus = $('#user_campus').val();
        if (!idCampus) {
            Swal.fire({
                icon: 'warning',
                title: 'Atención',
                text: 'Por favor selecciona un campus para continuar',
                confirmButtonColor: '#3085d6'
            });
            return;
        }

        // Obtener la información del analista seleccionado
        const campusData = $('#user_campus').select2('data')[0];
        const analistaId = campusData.analistaId;

        window.location.href = base_url + "admin/formulario/" + analistaId;

    });
});