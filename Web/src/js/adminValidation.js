$(document).ready(function(){
    const validarAcuse = new JustValidate("#admin"); 

    validarAcuse.addField("input#usuarioAdmin", 
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
    .addField("input#contraseñaAdmin", 
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
        event.target.submit(); 
        event.target.reset();
        
        /*const contenidoModal = `
            <div class = "text-start">
                <h4 class = "mb-3">Ok se ha ingresado usuario y contraseña</h4>
            </div>
        `; 

        Swal.fire({
            title: 'Verificación', 
            html: contenidoModal, 
            confirmButtonText: 'OK', 
            background: "#C1E8FF",
            color: "#282119",
            confirmButtonColor: "#448bd8"
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit(); 
                event.target.reset();
            }
        });; */
    }); 
}); 
