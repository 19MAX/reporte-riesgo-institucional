function showAlert(type, message, uniqueCode = null) {
    let title = "";
    let icon = "";

    switch (type) {
        case 'success':
            title = "¡Éxito!";
            icon = "success";
            break;
        case 'warning':
            title = "Advertencia";
            icon = "warning";
            break;
        case 'error':
            title = "¡Error!";
            icon = "error";
            break;
        default:
            title = "Información";
            icon = "info";
            break;
    }

    let finalMessage = message;
    if (uniqueCode) {
        finalMessage += ` (Código: ${uniqueCode})`;
    }

    swal({
        title: title,
        text: finalMessage,
        icon: icon,
        button: "Aceptar",
    });
}
