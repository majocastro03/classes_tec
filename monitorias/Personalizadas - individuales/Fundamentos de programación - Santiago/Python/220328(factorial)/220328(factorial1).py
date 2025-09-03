"""Programa que permite calcular el factorial de cualquier numero con while"""
otro = 1
print("Bienvenido al programa que le permite calcular el factorial de un numero menor a 10\n")
while (otro==1):
    n = int(input("Ingrese el numero a calcular el factoral: "))
    f = 1
    i = n
    while(i>1):
        f = f*i
        i = i-1
    print("Su factorial es",f)
    otro=int(input("Si desea otro ingrese 1:")) 
