$(document).ready(function() {

    const validarFormulario = new JustValidate("#formEditarUsuario");

    validarFormulario
    .addField("input#name", [{
        rule: "required",
        errorMessage: "Por favor ingrese el nombre"
    }, {
        rule: "minLength",
        value: 2,
        errorMessage: "El nombre debe tener al menos 2 caracteres"
    }, {
        rule: "customRegexp",
        value: /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/,
        errorMessage: "Solo se permiten letras y espacios"
    }])
    .addField("input#apellidoP", [{
        rule: "required",
        errorMessage: "Por favor ingrese el apellido paterno"
    }, {
        rule: "minLength",
        value: 2,
        errorMessage: "El apellido debe tener al menos 2 caracteres"
    }, {
        rule: "customRegexp",
        value: /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/,
        errorMessage: "Solo se permiten letras y espacios"
    }])
    .addField("input#apellidoM", [{
        rule: "required",
        errorMessage: "Por favor ingrese el apellido materno"
    }, {
        rule: "minLength",
        value: 2,
        errorMessage: "El apellido debe tener al menos 2 caracteres"
    }, {
        rule: "customRegexp",
        value: /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/,
        errorMessage: "Solo se permiten letras y espacios"
    }])
    .addField("input#telefono", [{
        rule: "required",
        errorMessage: "Por favor ingrese el teléfono"
    }, {
        rule: "customRegexp",
        value: /^[0-9]{10}$/,
        errorMessage: "Ingrese un número de teléfono válido de 10 dígitos"
    }])
    .addField("input#email", [{
        rule: "required",
        errorMessage: "Por favor ingrese el correo electrónico"
    }, {
        rule: "customRegexp",
        value: /^[a-zA-Z0-9]+@alumno\.ipn\.mx$/, 
        errorMessage: "El correo ingresado debe ser institucional (con dominio: @alumno.ipn.mx)"
    }])
    .addField("input#boleta", [{
        rule: "required",
        errorMessage: "Por favor ingrese el número de boleta"
    }, {
        rule: "customRegexp",
        value: /^[0-9]{10}$/,
        errorMessage: "El número de boleta debe tener 10 dígitos"
    }])
    .addField("input#estatura", [{
        rule: "required",
        errorMessage: "Por favor ingrese la estatura en centímetros"
    }, {
        rule: "number",
        errorMessage: "Ingrese un número válido"
    }, {
        rule: "minNumber",
        value: 100,
        errorMessage: "La estatura mínima es 100 cm"
    }, {
        rule: "maxNumber",
        value: 250,
        errorMessage: "La estatura máxima es 250 cm"
    }]).addField("input#cred", [{
        rule: "required",
        errorMessage: "Por favor suba su credencial"
    }, {
        rule: "files",
        value: {
            files: {
                extensions: ['jpg', 'jpeg', 'png', 'pdf']
            }
        },
        errorMessage: "Solo se permiten archivos jpg, jpeg, png o pdf"
    }])
    .addField("input#horario", [{
        rule: "required",
        errorMessage: "Por favor suba su horario"
    }, {
        rule: "files",
        value: {
            files: {
                extensions: ['jpg', 'jpeg', 'png', 'pdf']
            }
        },
        errorMessage: "Solo se permiten archivos jpg, jpeg, png o pdf"
    }])
    .onSuccess((event) => {
        event.target.submit(); 
        event.target.reset();
    });   
});
