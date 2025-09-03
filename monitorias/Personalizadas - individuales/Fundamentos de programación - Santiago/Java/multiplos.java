import java.util.Scanner;
public class multiplos {
    public static void main(String[] args) throws Exception {
		Scanner lScanner=new Scanner(System.in);
		int C3= 0;
		int C2= 0;
		int n;
		int otro = 0;
		do{
			System.out.println("ingrese un numero por favor \n");
			n = lScanner.nextInt();
			
			if(n!=0){
				if(n%2==0){
					System.out.println("es multiplo de 2\n");
					C2 = C2+1;
				}
				if(n%3==0){
					System.out.println("es multiplo de 3\n");
					C3 = C3 +1;
				}
			}
			System.out.println("si desea ingresar terminar el programa digite 0\n");
			otro = lScanner.nextInt();
		} while(otro!= 0);
        	System.out.println("la cantidad de multiplos de 3 ingresados fueron: \n"+C3);
			System.out.println("la cantidad de multiplos de 2 ingresados fueron: \n"+C2);
			lScanner.close();
    }
}
