import java.util.Scanner;
public class suma {
    public static void main(String[] args){
        int a;
        int b;
        Scanner leer= new Scanner(System.in);
            System.out.println("ingrese el primer numero");
            a = leer.nextInt();
            System.out.println("ingrese el segundo numero");
            b= leer.nextInt();
            leer.close();
            int suma =a + b;
            System.out.println("La suma es: " + suma);
        
    }
}
