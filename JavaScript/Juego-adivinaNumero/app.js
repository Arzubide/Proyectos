let listaNumeroSorteados = [];
let numeroMaximo = 10;

function asignarTextoElemento(elemento, contenido){

    //funcion para optimizar el asignamiento de texto a las clases, elementos, etc de la pagina
    let elementoHTML = document.querySelector(elemento);
    elementoHTML.innerHTML = contenido;

}

function generarNumeroSecreto() {
    let NumeroGenerado = parseInt(Math.random()*numeroMaximo)+1;

    console.log(NumeroGenerado);
    console.log(listaNumeroSorteados);
    //Verificamos si ya se sortearon todos los numeros posibles, de ser asi, se termina el juego. Esto a fin de tratar con el problema de recursividad

    if(listaNumeroSorteados.length() == 10){
        let numero = 0;
    }else{

        if(listaNumeroSorteados.includes(NumeroGenerado)){
            //Se utiliza el metodo includes, el cual verifica si el elemento entre parentesis se encuentra en la lista 
            return (generarNumeroSecreto());
        }else{
            listaNumeroSorteados.push(NumeroGenerado);
            return(NumeroGenerado);
        }
    }
}

function verificarIntento(){

    let numeroUsuario = parseInt(document.getElementById('NumUsuario').value); //con getElementById accedemos al elemento pero agregandole ".value" obtenemos el valor del elemento seleccionado


    if (numeroUsuario === numeroSecreto){ //El triple igual sirve para validar si son del mismo tipo de dato y en cuanto a valor son iguales

        asignarTextoElemento('p', `Acertaste, el numero era  ${numeroSecreto}, acertaste en ${NumeroIntentos} ${NumeroIntentos >1 ? 'intentos' : 'intento'}`); //Llamamos a la funcion para poder poner el texto en el parrafo

        document.getElementById('reiniciar').removeAttribute('disabled'); //Una vez que gana el jugador, habilitamos el boton 'Nuevo juego' con removeAttribute que removemos el atributo de desabilitado, que esta desabilitado desde el inicio del juego
          
    }
    else if(numeroUsuario > numeroSecreto){
        asignarTextoElemento('p', 'El numero secreto es menor');
        NumeroIntentos ++;
        document.getElementById('NumUsuario').value= ''; //Si el usuario se equivoca, automaticamente limpiamos el valor de la caja para que pueda volver a ingresar otro valor
    
    }
    else if(numeroUsuario < numeroSecreto){
        asignarTextoElemento('p', 'El numero secreto es mayor');
        NumeroIntentos++;
        document.getElementById('NumUsuario').value= ''; //Si el usuario se equivoca, automaticamente limpiamos el valor de la caja para que pueda volver a ingresar otro valor
    
    }
}

function reiniciarJuego(){
    //Para reiniciar el juego, limpiara la caja
    document.getElementById('NumUsuario').value = '';
    //Generar el numero aleatorio otra vez
    numeroSecreto = generarNumeroSecreto();
    // colocar el mensaje de colocar el numero del 1 - 10
    asignarTextoElemento('p',`Ingresa un numero del 1 - ${numeroMaximo}`);
    //inicializar el numero de intentos
    NumeroIntentos = 1;
    // desabilitar otra vez el boton de "Nuevo juego"
    document.getElementById('reiniciar').setAttribute('disabled',true);
    
}

let NumeroIntentos = 1;
let numeroSecreto = generarNumeroSecreto(); //almacenamos el numero random generado por la funcion 

// let titulo = document.querySelector('h1') //document permite establecer una conexion entre HTML y Js, querySelector permite seleccionar a traves de las etiquetas, id's, calses, etc querySelector tiene otras equivales pero para este caso se utilizara de esta manera

// titulo.innerHTML = "Juego del numero secretro"; //A traves de la etiqueta innerHTML le asignamos o le colocamos un texto a el elemento seleccionado que en este caso es el H1

// let parrafo = document.querySelector('.texto__parrafo'); //En este caso se selecciona el parrafo a traves de la clase
// parrafo.innerHTML = "Ingrea un numero del 1 - 10"

asignarTextoElemento('h1','Bienvenido al juego'); //el codigo de la linea n - n fue sustituido por la funcion de la linea 2
asignarTextoElemento('.texto__parrafo', "Ingresa un numero del 1 - 10");