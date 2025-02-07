$(document).ready(function() {

    const validarFormulario = new JustValidate("#formulario");

    validarFormulario
    .addField("input#name", [{
        rule: "required",
        errorMessage: "Por favor ingrese su nombre"
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
        errorMessage: "Por favor ingrese su apellido paterno"
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
        errorMessage: "Por favor ingrese su apellido materno"
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
        errorMessage: "Por favor ingrese su teléfono"
    }, {
        rule: "customRegexp",
        value: /^[0-9]{10}$/,
        errorMessage: "Ingrese un número de teléfono válido de 10 dígitos"
    }])
    .addField("input#email", [{
        rule: "required",
        errorMessage: "Por favor ingrese su correo electrónico"
    }, {
        rule: "customRegexp",
        value: /^[a-zA-Z0-9]+@alumno\.ipn\.mx$/, 
        errorMessage: "El correo ingresado debe ser institucional (con dominio: @alumno.ipn.mx)"
    }])
    .addField("input#boleta", [{
        rule: "required",
        errorMessage: "Por favor ingrese su número de boleta"
    }, {
        rule: "customRegexp",
        value: /^[0-9]{10}$/,
        errorMessage: "El número de boleta debe tener 10 dígitos"
    }])
    .addField("input#estatura", [{
        rule: "required",
        errorMessage: "Por favor ingrese su estatura en centímetros"
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
    }])
    .addField("input#cred", [{
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
    .addField("input#user", [{
        rule: "required",
        errorMessage: "Por favor ingrese un nombre de usuario"
    }, {
        rule: "minLength",
        value: 4,
        errorMessage: "El usuario debe tener al menos 4 caracteres"
    }, {
        rule: "customRegexp",
        value: /^[a-zA-Z0-9_]+$/,
        errorMessage: "Solo se permiten letras, números y guiones bajos"
    }])
    .addField("input#password", [{
        rule: "required",
        errorMessage: "Por favor ingrese una contraseña"
    }, {
        rule: "minLength",
        value: 8,
        errorMessage: "La contraseña debe tener al menos 8 caracteres"
    }, {
        rule: "customRegexp",
        value: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/,
        errorMessage: "La contraseña debe contener al menos una letra, un número y un carácter especial"
    }])
    .onSuccess((event) => {
        event.preventDefault();


        const solicitud=$('input[name="gridRadios"]:checked').val();
        const numLocker=$('#NumLocker').val();

        const credencialValue= $('#cred').val();
        const horarioValue= $('#horario').val();
        
        let errorText=`<div class="text-start">`
        console.log(numLocker)
        console.log(solicitud)

        if(solicitud==='option1' && !numLocker || !credencialValue || !horarioValue){

            if(solicitud==='option1' && !numLocker)
                errorText+=`<p>Debes ingresar el número del locker que tienes actualmente asignado</p>`;
            if(!credencialValue)
                errorText+=`<p>Debes subir tu credencial escolar</p>`; 
            if(!horarioValue)
                errorText+=`<p>Debes subir tu horario escolar</p>`; 
            errorText += `</div>`; 

            Swal.fire({
                title: 'ERROR',
                html: errorText,
                icon: 'error',
                confirmButtonText: 'Aceptar',
                customClass: {
                    title: '  font-family: "Outfit", sans-serif !important',
                    htmlContainer: '  font-family: "Outfit", sans-serif !important'
                },
                background: "#C1E8FF",
                iconColor: "#ff0000",
                color: "#282119",
                confirmButtonColor: "#448bd8"
            })
            
            return;
        }
        
        const formData = {
            tipoSolicitud: $('input[name="gridRadios"]:checked').val() === 'option1' ? 'Renovación' : 'Primera vez',
            auth: $('input[name="gridRadios"]:checked').val() === 'option1' ? true : false,
            numLocker: $('#NumLocker').val(),
            nombres: $('#name').val(),
            apellidoP: $('#apellidoP').val(),
            apellidoM: $('#apellidoM').val(),
            telefono: $('#telefono').val(),
            email: $('#email').val(),
            boleta: $('#boleta').val(),
            estatura: $('#estatura').val(),
            credencial_name: $('#cred')[0].files[0].name, 
            horario_name: $('#horario')[0].files[0].name,
            credencial: $('#cred')[0].files[0], 
            horario: $('#horario')[0].files[0],
            usuario: $('#user').val(),
            password:$('#password').val()
        };


      
        const htmlContent = `
            <div class="text-start">
                <h4 class="mb-3">Resumen de datos:</h4>
                <p><strong>Solicitud:</strong> ${formData.tipoSolicitud}</p>                 
                ${formData.tipoSolicitud === 'Renovación' ? `<p><strong>Locker:</strong> ${formData.numLocker}</p>` : ''}
                <p><strong>Nombre completo:</strong> ${formData.nombres} ${formData.apellidoP} ${formData.apellidoM}</p>
                <p><strong>Usuario:</strong> ${formData.usuario}</p>
                <p><strong>Teléfono:</strong> ${formData.telefono}</p>
                <p><strong>Correo:</strong> ${formData.email}</p>
                <p><strong>Número de boleta:</strong> ${formData.boleta}</p>
                <p><strong>Estatura:</strong> ${formData.estatura} cm</p>
                <p><strong>Credencial:</strong> ${formData.credencial_name}</p>
                <p><strong>Horario:</strong> ${formData.horario_name}</p>
            </div>
        `;

        Swal.fire({
            title: '¿Los datos son correctos?',
            html: htmlContent,
            icon: 'question',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, enviar',
            cancelButtonText: 'No, corregir',
            customClass: {
               title: '  font-family: "Outfit", sans-serif !important',
                htmlContainer: '  font-family: "Outfit", sans-serif !important'
            },
            background: "#C1E8FF",
            iconColor: "#fffb0f",
            color: "#282119",
            confirmButtonColor: "#448bd8"
        }).then((result) => {
            if (result.isConfirmed) {
                const data = new FormData();
                Object.entries(formData).forEach(([key, value]) => {
                    data.append(key, value);
                });
                console.log(data);

                $.ajax({
                    url:"../php/controller/user_controller.php",
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    method:"POST",
                    success: function(respuesta) {
                        try {
                            let response = typeof respuesta === 'string' ? JSON.parse(respuesta) : respuesta;
                            console.log('Respuesta del servidor:', response); // Para debugging
                            
                            if (response.cod === 401) {
                                Swal.fire({
                                    position: 'top-center',
                                    icon: 'error',
                                    title: '¡ERROR!',
                                    text: response.msj,
                                    showConfirmButton: true,
                                    customClass: {
                                        title: '  font-family: "Outfit", sans-serif !important',
                                         htmlContainer: '  font-family: "Outfit", sans-serif !important'
                                     },
                                     background: "#C1E8FF",
                                     iconColor: "#fffb0f",
                                     color: "#282119",
                                     confirmButtonColor: "#448bd8"
                                }).then(() => {
                                    location.reload();
                                });
                            } else if(response.cod == 200 || response.cod == 201){
                                Swal.fire({
                                    position: 'top-center',
                                    icon: 'success',
                                    title: '¡ÉXITO!',
                                    text: response.msj,
                                    showConfirmButton: true,
                                    customClass: {
                                        title: '  font-family: "Outfit", sans-serif !important',
                                         htmlContainer: '  font-family: "Outfit", sans-serif !important'
                                     },
                                     background: "#C1E8FF",
                                     iconColor: "#fffb0f",
                                     color: "#282119",
                                     confirmButtonColor: "#448bd8"
                                }).then(() => {
                                    window.location.href = response.url;
                                });
                            }else{
                                Swal.fire({
                                    position: 'top-center',
                                    icon: 'error',
                                    title: '¡ERROR!',
                                    text: "Ha ocurrido un error",
                                    showConfirmButton: true,
                                    customClass: {
                                        title: 'custom-title-class',
                                        htmlContainer: 'custom-title-class'
                                    },
                                    background: "#eee8dc",
                                    iconColor: "#C97338",
                                    color: "#282119",
                                    confirmButtonColor: "#A54027"
                                }).then(() => {
                                    location.reload();
                                });
                            }
                        } catch (error) {
                            console.error('Error al procesar la respuesta:', error);
                            console.log('Respuesta raw:', respuesta);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Hubo un error al procesar la respuesta del servidor'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error en la petición AJAX:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'No se pudo completar la petición al servidor'
                        });
                    }
                })  
                
            }
        });
    });

    
     $('input[name="gridRadios"]').change(function() {
        if ($("#gridRadios1").is(":checked")) {
            $(".contlocker").show();
        } else {
            $(".contlocker").hide();
            $("#NumLocker").val('');
        }
    });

    $('input[name="gridRadios"]:checked').trigger('change');
   
});
