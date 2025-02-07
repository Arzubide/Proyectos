document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btnEnviar').addEventListener('click', onSubmit);
});

const onSubmit = (event) => {
    event.preventDefault();

     // Obtener userId de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const userId = urlParams.get('userId');
            // Crear FormData con los valores del formulario
        

              const data = new FormData();
            data.append('comprobantePago', $('#inputGroupFile02')[0].files[0]);
            data.append('type', "loadComprobante");
            data.append('userId', userId);

          
            // Realizar la petición AJAX
            $.ajax({
                url: "../php/controller/acuse_controller.php",
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                success: function(respuesta) {
                    
                    try {
                        let response = typeof respuesta === 'string' ? JSON.parse(respuesta) : respuesta;
                        
                        if (response.cod === 200) {
                            // Ocultar el div de subida de archivo
                            $('#contenidoform').hide();
                            // Mostrar el botón de generar acuse
                            $('#acuerdo').hide();
                            $('#acuse2').show();

                            
                            Swal.fire({
                                position: 'top-center',
                                icon: 'success',
                                title: '¡ÉXITO!',
                                text: response.msj,
                                showConfirmButton: true,
                                customClass: {
                                    title: 'font-family: "Outfit", sans-serif !important',
                                    htmlContainer: 'font-family: "Outfit", sans-serif !important'
                                },
                                background: "#C1E8FF",
                                iconColor: "#fffb0f",
                                color: "#282119",
                                confirmButtonColor: "#448bd8"
                            });
                        } else {
                            Swal.fire({
                                position: 'top-center',
                                icon: 'error',
                                title: '¡ERROR!',
                                text: response.msj || "Ha ocurrido un error",
                                showConfirmButton: true,
                                customClass: {
                                    title: 'font-family: "Outfit", sans-serif !important',
                                    htmlContainer: 'font-family: "Outfit", sans-serif !important'
                                },
                                background: "#C1E8FF",
                                iconColor: "#ff0000",
                                color: "#282119",
                                confirmButtonColor: "#448bd8"
                            });
                        }
                    } catch (error) {
                        console.error('Error al procesar la respuesta:', error);
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
            });
        }