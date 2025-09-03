Algoritmo sin_titulo
	C3 <- 0
	C2 <- 0
	Repetir
		Escribir "Ingrese un numero por favor"
		Leer n
		Si n!=0 Entonces
			Si n%2==0 Entonces
				Escribir n "es multiplo de 2"
				C2 = C2+1
			FinSi
			Si n%3==0 Entonces
				Escribir n "es multiplo de 3"
				C3 = C3+1
			FinSi
		FinSi
		Escribir "Si desea ingresar otro numero ingrese 1"
		Leer otro
	Hasta Que otro!=1
	Escribir 'La cantidad de multiplos de 3 ingresados fueron:',C3
	Escribir 'La cantidad de multiplos de 2 ingresados fueron:',C2
FinAlgoritmo
