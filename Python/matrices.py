print('De cuantas columnas desea hacer la matriz')
c = int(input())
print('De cuantas filas desea hacer la matriz')
n = int(input())

matriz = []

for i in range(c):
    fila = []
    for j in range(n):
        fila.append('-')
    matriz.append(fila)

print(matriz)