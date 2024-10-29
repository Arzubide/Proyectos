'''
1 .Diseña e implementa una función que genere al azar un RFC sin homoclave, i.e. una cadena con cuatro letras mayúsculas seguido de 6 dígitos.

2. Diseña e implementa una función que genere al azar una número de celular, i.e. una cadena 10 dígitos, con el formato 55-dddd-dddd, donde d representa a un dígito.

3. Diseña e implementa una función en C que genere al azar palabras que tengan al inicio n número de caracteres alfabéticos, seguido de m dígitos. Por ejemplo, v58, abc123, prueba5, var45677.
'''

import random


def CURP():
    ListaNums = list(range(65,90)) #Cereamos una lista con las letras en mayusculas en numeros ASCCI
    
    #print(chr(letraAleatoria)) #Imprimimos la letra ASCCI utilizando chr()
    CurpLetras = []
    for i in range(0,4):
        letraAleatoria = random.choice(ListaNums) #Seleccionamos un elemento de la lista aleatoriamente
        CurpLetras.append(chr(letraAleatoria))
    
    print(CurpLetras)
    

CURP()