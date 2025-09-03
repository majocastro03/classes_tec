"""Programa que permite hacer sumas, restas, divisiones o modulos de un numero con while e if"""
otro = 1
while(otro==1):
    print("Bienvenido a esta calculadora\n")
    a = int(input("Ingrese el primer termino:"))
    b = int(input("Ingrese el segundo termino:"))
    N = int(input("Si desea sumar ingrese 1 \nSi desea restar ingrese 2 \nSi desea multiplicar ingrese 3 \nSi desea dividir ingrese 4 \nSi desea el modulo ingrese 5 \n"))
    if N == 1: Op = a + b
    if N == 2: Op = a - b
    if N == 3: Op = a * b 
    if N == 4: Op = a/b
    if N == 5: Op = a%b
    print("El resultado de su operacion es", Op)
    otro = int(input("Si desea hacer otra operacion ingrese 1:"))




