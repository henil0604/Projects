#include <stdio.h>
#define PI 3.14
#define p printf
#define s scanf
#define f float


int main(){
	
	f radius, cir;
	p("\nThis is the program there you can get the Circumference.\n");
	p("\nEnter The value of Radius: ");
	s("%f", &radius);
	p("\n\nWait Calulating...\n\n\n");
	cir = 2 * PI * radius;
	p("\nThe Circumfence of the circle with radius %.2f is %.2f \n \n", radius, cir);

	scanf();
}
