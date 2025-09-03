import java.util.Scanner;
public class cntbilletes {
    public static void main(String[] args) {
		Scanner leer= new Scanner(System.in);
		int otro= 1; 
		/*int tb50=0;
		int tb20=0;
		int tb10=0;
		*/
		while(otro==1){
			int b50=0;
			int b20=0;
			int b10=0;
			int cntbll=0;
			int vlr = 0;
			while((cntbll<3)&&(vlr<10||vlr>400||vlr%10!=0)){
			System.out.println("ingrese el valor: \n");
			vlr = leer.nextInt();
			cntbll=(cntbll+1);
			}
		 if(cntbll<3){
			b50 = (vlr/50);
			/*tb50= (b50+1);*/
			b20= ((vlr%50)/20);
			/*tb20=(b20+1);*/
			b10=(((vlr%50)%20)/10);
			/*tb10=(b10+1);*/
		}else{
			System.out.println("no sabe usarlo\n");
		}
		System.out.println("los billetes de 50 son: \n" + b50);
		System.out.println("\nlos billetes son 20:\n" + b20);
		System.out.println("\nlos billetes son 10:\n" + b10);
		System.out.println("\ningrese 1 si desea otro: ");
		otro = leer.nextInt();
		leer.close();
    }
} }