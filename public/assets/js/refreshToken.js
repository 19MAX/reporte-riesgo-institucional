function refreshCsrfToken() {
    return fetch(base_url + "getNewCsrfToken")
        .then((response) => {
            if (!response.ok) {
                throw new Error("No se pudo obtener un nuevo token CSRF");
            }
            return response.json();
        })
        .then((data) => {
            if (data.csrfName && data.csrfHash) {
                const csrfInput = document.getElementById("csrf_token_name");
                csrfInput.name = data.csrfName;
                csrfInput.value = data.csrfHash;
                return data;
            } else {
                throw new Error("Respuesta de token CSRF incompleta");
            }
        })
        .catch((error) => {
            console.error("Error al refrescar el token CSRF:", error);
            throw error;
        });
}