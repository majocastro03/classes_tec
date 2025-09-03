numeros = [1, 2, 3, 4, 5]

# Ejercicio: leer 5 notas y calcular el promedio
notas = []
for i in range(5):
	nota = float(input(f"Ingrese la nota {i+1}: "))
	notas.append(nota)
promedio = sum(notas) / len(notas)
print(f"El promedio de las notas es: {promedio}")
