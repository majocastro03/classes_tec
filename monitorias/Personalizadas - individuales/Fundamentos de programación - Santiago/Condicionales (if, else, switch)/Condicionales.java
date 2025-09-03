import java.util.Scanner;

public class Condicionales {
    public static void main(String[] args) {
        // Ejemplo de if/else (decisión simple)
        int numero = 10;
        if (numero > 5) {
            System.out.println("El número es mayor que 5");
        } else {
            System.out.println("El número es menor o igual que 5");
        }

        // Ejemplo de if anidado (varias condiciones)
        Scanner sc = new Scanner(System.in);
        System.out.print("Introduce tu edad: ");
        int edad = sc.nextInt();
        if (edad < 18) {
            System.out.println("Eres menor de edad");
        } else {
            if (edad < 65) {
                System.out.println("Eres adulto");
            } else {
                System.out.println("Eres adulto mayor");
            }
        }

        // Ejemplo de switch (alternativa al if múltiple)
        int opcion = 2;
        switch(opcion) {
            case 1:
                System.out.println("Opción 1");
                break;
            case 2:
                System.out.println("Opción 2");
                break;
            case 3:
                System.out.println("Opción 3");
                break;
            default:
                System.out.println("Opción inválida");
        }
    }
    }
