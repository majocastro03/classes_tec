public class Arreglos {
    // Ejemplo de declaración de arreglo
    int[] numeros = {1, 2, 3, 4, 5};

    public static void main(String[] args) {
        // Ejercicio: leer 5 notas y calcular el promedio
        java.util.Scanner sc = new java.util.Scanner(System.in);
        double[] notas = new double[5];
        double suma = 0;
        for (int i = 0; i < notas.length; i++) {
            System.out.print("Ingrese la nota " + (i+1) + ": ");
            notas[i] = sc.nextDouble();
            suma += notas[i];
        }
        double promedio = suma / notas.length;
        System.out.println("El promedio de las notas es: " + promedio);
        sc.close();
    }
}
