import random

print('Cuantas contraseñas deseas generar:')
c = int(input())
print('Ingrese la longitud que desea que sea su contraseña: ')
n = int(input())
caracteres = 'abcdefghijklmnoprstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*().;'


for i in range(c):
    contraseñaCreada = ''
    for j in range(n):
        letraN = random.choice(caracteres)
        contraseñaCreada = contraseñaCreada + letraN
    print(f'Contraseña {i+1} es: {contraseñaCreada}')
