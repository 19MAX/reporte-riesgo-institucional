document.addEventListener("DOMContentLoaded", function () {


    const forms = document.querySelectorAll('.form-seccion');
    let currentFormIndex = 0;

    // Función para guardar datos del formulario en Local Storage
    function guardarDatosLocalStorage() {
        const formData = new FormData(forms[currentFormIndex]);
        const data = {};
        for (const [key, value] of formData.entries()) {
            data[key] = value;
        }
        localStorage.setItem(`form-${currentFormIndex}`, JSON.stringify(data));
    }

    // Función para cargar datos del formulario desde Local Storage
    function cargarDatosLocalStorage() {
        const storedData = localStorage.getItem(`form-${currentFormIndex}`);
        if (storedData) {
            const formData = JSON.parse(storedData);
            for (const key in formData) {
                if (Object.hasOwnProperty.call(formData, key)) {
                    const input = forms[currentFormIndex].querySelector(`[name="${key}"]`);
                    if (input) {
                        input.value = formData[key];
                    }
                }
            }
        }
    }

    function addChangeEventToSelects() {
        const selects = forms[currentFormIndex].querySelectorAll('select');
        selects.forEach(select => {
            select.addEventListener('change', function () {
                if (this.value !== '') {
                    this.classList.remove('border-danger');
                }
            });
        });
    }

    // Mostrar el formulario actual y cargar datos desde Local Storage
    function mostrarFormulario() {
        forms.forEach((form, index) => {
            form.style.display = index === currentFormIndex ? 'block' : 'none';
        });
        cargarDatosLocalStorage();
        actualizarBotones();
        addChangeEventToSelects();
    }

    // Navegar al formulario anterior
    function mostrarFormularioAnterior() {
        if (currentFormIndex > 0) {
            guardarDatosLocalStorage();
            currentFormIndex--;
            mostrarFormulario();
        }
    }
    function resaltarCamposVacios(form) {
        const inputs = form.querySelectorAll('select');

        inputs.forEach(input => {
            if (input.value === '') {
                // Agregar una clase para resaltar el campo vacío
                input.classList.add('border-danger');
            } else {
                // Remover la clase si el campo ya tiene un valor
                input.classList.remove('border-danger');
            }
        });
    }
    // Función para validar un formulario
    function validarFormulario(form) {
        const inputs = form.querySelectorAll('select');
        let isValid = true;

        inputs.forEach(input => {
            if (input.value === '') {
                isValid = false;
            }
        });

        return isValid;
    }

    // Navegar al siguiente formulario
    function mostrarFormularioSiguiente() {
        const currentForm = forms[currentFormIndex];

        // Validar el formulario actual
        if (validarFormulario(currentForm)) {
            // Guardar datos del formulario en Local Storage
            guardarDatosLocalStorage();

            if (currentFormIndex < forms.length - 1) {
                currentFormIndex++;
                mostrarFormulario();
            }
        } else {
            const formTitle = currentForm.querySelector('h5.form-title').textContent;

            swal(
                "Ups! Algo salio mal!",
                "Por favor, complete todos los campos del formulario: " + formTitle,
                "error"
            );

            // Resaltar los campos vacíos
            resaltarCamposVacios(currentForm);
        }
    }


    // Función para imprimir los resultados en la consola
    function imprimirResultados() {
        const seguridad_estructural = [];
        const seguridad_no_estructural = [];
        const seguridad_funcional = [];
        const seguridad_administrativa = [];

        forms.forEach((form, index) => {
            const formData = new FormData(form);
            const data = {};
            for (const [key, value] of formData.entries()) {
                data[key] = value;
            }
            const formIndex = index + 1;
            if (formIndex === 1) {
                seguridad_estructural.push({ formIndex, data });
            } else if (formIndex >= 2 && formIndex <= 9) {
                seguridad_no_estructural.push({ formIndex, data });
            } else if (formIndex >= 10 && formIndex <= 12) {
                seguridad_funcional.push({ formIndex, data });
            } else if (formIndex >= 13 && formIndex <= 19) {
                seguridad_administrativa.push({ formIndex, data });
            }
        });

        // Aquí puedes procesar los datos y enviarlos al controlador PHP
        procesarDatosEnControlador({
            seguridad_estructural,
            seguridad_no_estructural,
            seguridad_funcional,
            seguridad_administrativa
        });
    }

    // Función para procesar los datos y enviarlos al controlador PHP
    function procesarDatosEnControlador(datos) {
        // Obtener token
        const csrfName = document.getElementById("csrf_token_name").name;
        const csrfHash = document.getElementById("csrf_token_name").value;
        // Agregar el token CSRF al objeto de datos
        datos[csrfName] = csrfHash;
        console.log(datos);
        fetch(base_url + "admin/formulario/insertFichas", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(datos)
        })
            .then(response => {
                refreshCsrfToken();
                if (!response.ok) {
                    return response.json().then(data => {
                        let errorMessage = "La acción no se pudo realizar correctamente!";
                        if (data && data.error) {
                            errorMessage = data.error;
                        }
                        throw new Error(errorMessage);
                    });
                }
                return response.json();
            })
            .then(data => {
                refreshCsrfToken();
                swal({
                    title: "¡En Hora Buena!",
                    text: "La acción se realizó de manera exitosa!",
                    icon: "success",
                    timer: 1000,
                    buttons: false,
                }).then(() => {
                    forms.forEach((form, index) => {
                        localStorage.removeItem(`form-${index}`);
                    });
                    location.reload(); // Recarga la página después de remover los items del localStorage
                });
            })
            .catch(error => {
                refreshCsrfToken();
                // console.error("Error al insertar los datos:", error.message);
                swal("¡Ups! Algo salió mal!", error.message, "error");
            });
    }



    // Función para actualizar la visibilidad de los botones
    function actualizarBotones() {
        const anteriorBtn = document.getElementById('anteriorBtn');
        const siguienteBtn = document.getElementById('siguienteBtn');
        const imprimirBtn = document.getElementById('imprimirBtn');
        const iconoAnterior = document.getElementById('iconoAnterior');
        const iconoSiguiente = document.getElementById('iconoSiguiente');
        const iconoGuardar = document.getElementById('iconoGuardar');

        anteriorBtn.style.display = currentFormIndex === 0 ? 'none' : 'inline-block';
        iconoAnterior.style.display = currentFormIndex === 0 ? 'none' : 'inline-block';
        siguienteBtn.style.display = currentFormIndex === forms.length - 1 ? 'none' : 'inline-block';
        iconoSiguiente.style.display = currentFormIndex === forms.length - 1 ? 'none' : 'inline-block';
        imprimirBtn.style.display = currentFormIndex === forms.length - 1 ? 'inline-block' : 'none';
        iconoGuardar.style.display = currentFormIndex === forms.length - 1 ? 'inline-block' : 'none';
    }

    // Event listener para el botón "Anterior"
    document.getElementById('anteriorBtn').addEventListener('click', mostrarFormularioAnterior);

    // Event listener para el botón "Siguiente"
    document.getElementById('siguienteBtn').addEventListener('click', mostrarFormularioSiguiente);

    // Event listener para el botón "Imprimir"
    document.getElementById('imprimirBtn').addEventListener('click', imprimirResultados);

    // Mostrar el primer formulario al cargar la página
    mostrarFormulario();

});