// El principal objetivo de este desafío es fortalecer tus habilidades en lógica de programación. Aquí deberás desarrollar la lógica para resolver el problema.
let formatoInput = /^[a-zA-z]{3}/; //Se crea una expresion regular que valida que se ingresa algun textos
let listaAmigosArray = [];


function agregarAmigo(){
    let amigoIngresado = document.getElementById('amigoIngresadoInput').value; //Se obtiene el amigo ingresado por el usuario

    if(formatoInput.test(amigoIngresado)){
        //Se crea una condicion con la utilizacion de la expresion regular, .test devuelte true si concide con el formato ingresado (el usuario forzosamente tiene que ingresar letras), si coincide entra dentro del if
        listaAmigosArray.push(amigoIngresado);

        //Las siguientes 4 lineas son para agregar los nombres a una lista creada en HTML
        let lista = document.getElementById('listaAmigos'); //Selecciona la lista <ul> o <ol> con el ID 'listaAmigos'
        let li = document.createElement("li"); //Creamos un elemento de tipo li
        li.textContent = amigoIngresado; //Asigna el contenido de la variable amigoIngresado al <li>
        lista.appendChild(li) //Agrega el li creado dentro de la lista "lista"

        console.log(listaAmigosArray);
        document.getElementById('amigoIngresadoInput').value = ''; //Se limpia la caja cada vez que se ingresa un nombre
    }else{
        alert('Por favor ingresa un nombre valido');
    }
    
}


function sortearAmigo(){
    //Comprobamos que el array no este vacio
    if (listaAmigosArray.length != 0) {
        let numeroAleatorio = parseInt(Math.random()*listaAmigosArray.length+1); //Se genera un numero aleatorio entre los elementos que se encuentren en la lista de amigos
        
        document.getElementById('resultado').innerHTML = `El amigo seleccionado es ${listaAmigosArray[numeroAleatorio-1]}`
        
    }else{
        alert('La lista de amigos esta vacia,  ingresa al menos un nombre de amigo');
    }
}