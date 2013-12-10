#include <stdio.h>
#include <unistd.h>
#include <string.h>

int main(int argc, char** argv)
{
		unsigned char saisie[50];
		printf("Entre ton prénom: ");
		fflush (stdout);

		gets(saisie);
		printf("Bonjour ");
		printf(saisie);
		printf("\n");

		return 0;
}
