document.addEventListener("DOMContentLoaded", async function () {
    document.getElementById("btnInsertar").addEventListener("click", function () {
        insert(); // Llama a la función insert cuando se hace clic en el botón
    });

    function insert() {
        try {
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
            const cordX = document.getElementById("cord_x").value;
            const cordY = document.getElementById("cord_y").value;
            // Obtener token
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
            formData.append("cord_x", cordX);
            formData.append("cord_y", cordY);
            formData.append(csrfName, csrfHash); // Agregar CSRF token

            fetch(base_url + "admin/institutos/insertIes", {
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
                    return response.json(); // Procesar la respuesta en caso de éxito
                })
                .then((data) => {
                    refreshCsrfToken();
                    $("#miModal").modal("hide");
                    swal({
                        title: "¡En Hora Buena!",
                        text: "La acción se realizó de manera exitosa!",
                        icon: "success",
                        timer: 1000,
                        buttons: false,
                    });
                    // window.location.href = "../main/index.php?modulo=institutos";
                })
                .catch((error) => {
                    refreshCsrfToken();
                    console.error("Error al insertar los datos:", error.message);
                    swal("¡Ups! Algo salió mal!", error.message, "error");
                });
        } catch (error) {
            refreshCsrfToken();
            console.error("Error al obtener los datos del formulario:", error);
            swal("¡Ups! Algo salió mal!", "La acción no se pudo realizar correctamente.", "error");
        }
    }
});
