$(document).ready(function(){
    const validarAcuse = new JustValidate("#acuse"); 

    validarAcuse.addField("input#usuarioAcuse", 
        [
            {
                rule: "required", 
                errorMessage: "Por favor ingrese el nombre de usuario"
            }, 
            {
                rule: "minLength",
                value: 4,
                errorMessage: "Los nombres de usuario deben tener al menos 4 caracteres"
            }, 
            {
                rule: "customRegexp",
                value: /^[a-zA-Z0-9_]+$/,
                errorMessage: "Solo se permiten letras, números y guiones bajos"
            }
        ]
    )
    .addField("input#contraseñaAcuse", 
        [
            {
                rule: "required",
                errorMessage: "Por favor ingrese la contraseña"
            },
            {
                rule: "minLength",
                value: 8,
                errorMessage: "La contraseña debe tener al menos 8 caracteres"
            }
        ]
    )
    .onSuccess((event) => {
        event.preventDefault(); 

        const contenidoModal = `
            <div class = "text-start">
                <h4 class = "mb-3">Verificando información</h4>
            </div>
        `; 

        //Obetener los datos del acuse
        const formData = {
            username: $('#usuarioAcuse').val(),
            password: $('#contraseñaAcuse').val(),
        }  
        const data = new FormData();
        Object.entries(formData).forEach(([key, value]) => {data.append(key, value);});
  
       
    console.log(data);
        Swal.fire({
            title: 'Verificación', 
            html: contenidoModal, 
            confirmButtonText: 'OK', 
            background: "#C1E8FF",
            color: "#282119",
            confirmButtonColor: "#448bd8"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url:"../php/controller/acuse_controller.php",
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
                                    showConfirmButton: false,
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
                                    showConfirmButton: false,
                                    timer: 3000,
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
        });; 
    }); 
}); 
