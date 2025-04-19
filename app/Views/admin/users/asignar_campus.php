<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asignar Campus</title>
    <!-- Incluye los CSS de select2 y otros estilos necesarios -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="ruta/a/tu/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Asignar Campus a Usuario</h1>
        <form id="asignarCampusForm">
            <input type="hidden" id="userId" name="id_user" value="<?php echo $_GET['user_id']; ?>">
            <div class="mb-3">
                <label for="inputCampus" class="form-label">Campus</label>
                <select class="form-select" id="inputCampus" name="id_campus" style="width: 100%;" required></select>
            </div>
            <button type="submit" id="btnAsignarCampus" class="btn btn-primary">Asignar</button>
        </form>
    </div>

    <!-- Incluye los scripts de jQuery, select2 y otros necesarios -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="ruta/a/tu/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Cargar los datos de los campus
            async function loadCampuses() {
                try {
                    const response = await fetch("../../controllers/router.php?op=getAllCampus");
                    if (!response.ok) throw new Error("No se pudieron cargar los datos de los campus.");
                    const campuses = await response.json();
                    return campuses;
                } catch (error) {
                    console.error("Error al cargar los datos de los campus:", error);
                    return [];
                }
            }

            // Inicializar el select2 para campus
            async function initializeCampusSelect() {
                const campuses = await loadCampuses();
                const campusSelect = $('#inputCampus');
                campusSelect.html(campuses.map(campus => `<option value="${campus.id}">${campus.nombre}</option>`).join(''));
                campusSelect.select2();
            }

            initializeCampusSelect();

            // Manejar el envío del formulario
            document.getElementById("asignarCampusForm").addEventListener("submit", function (event) {
                event.preventDefault();
                const formData = new FormData(this);

                fetch("../../controllers/router.php?op=assignCampus", {
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
                    if (data && data.success) {
                        swal({
                            title: "¡En Hora Buena!",
                            text: "¡La acción se realizó de manera exitosa!",
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                        });
                        window.location.href = "ruta/a/tu/vista/principal.php"; // Cambia esta ruta a donde quieras redirigir después de asignar el campus
                    }
                })
                .catch((error) => {
                    console.error("Error al asignar el campus:", error.message);
                    swal("¡Ups! Algo salió mal!", error.message, "error");
                });
            });
        });
    </script>
</body>
</html>
