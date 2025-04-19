document.addEventListener("DOMContentLoaded", function () {
    // Cargar los datos de los campus
    async function loadCampuses() {
        try {
            const response = await fetch(base_url + "admin/campus/getAllCampus");
            if (!response.ok) throw new Error("No se pudieron cargar los datos de los campus.");
            const campuses = await response.json();
            return campuses;
        } catch (error) {
            console.error("Error al cargar los datos de los campus:", error);
            return [];
        }
    }

    async function loadInstitutes() {
        try {
            const response = await fetch(base_url + "admin/institutos/getInstitutos");
            if (!response.ok) throw new Error("No se pudieron cargar los datos de los institutos.");
            const institutes = await response.json();
            return institutes;
        } catch (error) {
            console.error("Error al cargar los datos de los institutos:", error);
            return [];
        }
    }

    // Manejar el cambio de rol
    document.getElementById("inputRol").addEventListener("change", async function () {
        const selectedRole = this.value;
        const campusContainer = document.getElementById("campusContainer");
        const campusSelect = document.getElementById("inputCampus");
        const instituteContainer = document.getElementById("instituteContainer");
        const instituteSelect = document.getElementById("inputInstitute");

        if (selectedRole == "3") {
            const campuses = await loadCampuses();
            campusSelect.innerHTML = campuses.map(campus => `<option value="${campus.id}">${campus.nombre}</option>`).join('');
            $(campusSelect).select2();
            campusContainer.style.display = "block";
            campusSelect.required = true;
            instituteContainer.style.display = "none";
            instituteSelect.required = false;
        } else if (selectedRole == "2") {
            const institutes = await loadInstitutes();
            instituteSelect.innerHTML = institutes.map(institute => `<option value="${institute.id}">${institute.nombre}</option>`).join('');
            $(instituteSelect).select2();
            instituteContainer.style.display = "block";
            instituteSelect.required = true;
            campusContainer.style.display = "none";
            campusSelect.required = false;
        } else {
            campusSelect.innerHTML = '';
            instituteSelect.innerHTML = '';
            $(campusSelect).select2('destroy');
            $(instituteSelect).select2('destroy');
            campusContainer.style.display = "none";
            campusSelect.required = false;
            instituteContainer.style.display = "none";
            instituteSelect.required = false;
        }
    });

    // Manejar el envío del formulario
    document.getElementById("agregarUsuarioForm").addEventListener("submit", function (event) {
        event.preventDefault();
        const formData = new FormData(this);
        // Obtener token
        const csrfName = document.getElementById("csrf_token_name").name;
        const csrfHash = document.getElementById("csrf_token_name").value;
        formData.append(csrfName, csrfHash); // Agregar CSRF token

        // Verificar campos visibles
        const inputRol = document.getElementById("inputRol").value;
        const inputCampus = document.getElementById("inputCampus");
        const inputInstitute = document.getElementById("inputInstitute");

        if ((inputRol == "3" && inputCampus.style.display != "none" && !inputCampus.value) ||
            (inputRol == "2" && inputInstitute.style.display != "none" && !inputInstitute.value)) {
            swal("¡Ups! Algo salió mal!", "Por favor, complete todos los campos requeridos.", "error");
            return;
        }

        fetch(base_url + "admin/users/registro", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    refreshCsrfToken();
                    swal({
                        title: "¡Excelente!",
                        text: "¡El registro se realizó de manera exitosa!",
                        icon: "success",
                        timer: 1500,
                        buttons: false,
                    });
                    // window.location.href = "ruta/a/tu/vista/principal.php"; // Cambia esta ruta a donde quieras redirigir después de agregar el usuario
                } else {
                    throw new Error(data.message || "La acción no se pudo realizar correctamente.");
                }
            })
            .catch((error) => {
                refreshCsrfToken();
                console.error("Error al agregar el usuario:", error.message);
                swal("¡Ups! Algo salió mal!", error.message, "error");
            });
    });
});