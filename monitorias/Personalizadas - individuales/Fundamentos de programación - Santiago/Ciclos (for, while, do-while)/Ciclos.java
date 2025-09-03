// Ejemplos de ciclos en Java
public class Ciclos {
	public static void main(String[] args) {
		// for: cuando sé cuántas veces repetir
		for (int i = 1; i <= 5; i++) {
			System.out.println("Iteración " + i);
		}

		// while: repetir mientras se cumpla la condición
		int j = 1;
		while (j <= 5) {
			System.out.println("Iteración " + j);
			j++;
		}

		// do-while: al menos una vez
		int k = 1;
		do {
			System.out.println("Iteración " + k);
			k++;
		} while (k <= 5);

		// -----------------------------
		// Ejercicio: imprimir del 1 al 10
		System.out.println("\nEjercicio: imprimir los números del 1 al 10 con for");
		for (int n = 1; n <= 10; n++) {
			System.out.println(n);
		}

		System.out.println("\nEjercicio: imprimir los números del 1 al 10 con while");
		int m = 1;
		while (m <= 10) {
			System.out.println(m);
			m++;
		}

		System.out.println("\nEjercicio: imprimir los números del 1 al 10 con do-while");
		int p = 1;
		do {
			System.out.println(p);
			p++;
		} while (p <= 10);
	}
}
