### If / else → decisiones simples.
numero = 10
if numero > 5:
    print("El número es mayor que 5")
else:
    print("El número es menor o igual que 5")
    
### If anidado → varias condiciones.
color = "rojo"
if color == "azul":
    print("El color es azul")
elif color == "rojo":
    print("El color es rojo")
else:
    print("El color no es azul ni rojo")

### Ejercicio
edad = int(input("Introduce tu edad: "))

if edad < 18:
    print("Eres menor de edad")
else:
    if edad < 65:
        print("Eres adulto")
    else:
        print("Eres adulto mayor")