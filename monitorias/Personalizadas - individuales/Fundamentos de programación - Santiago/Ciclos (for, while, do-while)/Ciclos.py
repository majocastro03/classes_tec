# Ejemplos de ciclos en Python

# for: cuando sé cuántas veces repetir
print("Ejemplo for:")
for i in range(1, 6):
    print(f"Iteración {i}")

# while: repetir mientras se cumpla la condición
print("\nEjemplo while:")
j = 1
while j <= 5:
    print(f"Iteración {j}")
    j += 1

# do-while: al menos una vez (simulado)
print("\nEjemplo do-while:")
k = 1
while True:
    print(f"Iteración {k}")
    k += 1
    if k > 5:
        break

# -----------------------------
# Ejercicio: imprimir del 1 al 10
print("\nEjercicio: imprimir los números del 1 al 10 con for")
for n in range(1, 11):
    print(n)

print("\nEjercicio: imprimir los números del 1 al 10 con while")
m = 1
while m <= 10:
    print(m)
    m += 1

print("\nEjercicio: imprimir los números del 1 al 10 con do-while (simulado)")
p = 1
while True:
    print(p)
    p += 1
    if p > 10:
        break
