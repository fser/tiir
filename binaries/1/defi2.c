#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#define PASSWORD "SD\\AO"

int main(int argc, char** argv)
{
		int i;
		if (argc != 2) {
				puts("Usage: ./defi2 <<passwd>>");
				exit(EXIT_FAILURE);
		}

		char* passwd = strdup(PASSWORD);
		for (i=0; i<5; ++i)
				passwd[i] = passwd[i]^(42+i);

		if (!strcmp(argv[1], passwd)) {
				setuid(0);
				system("/bin/sh");
				exit(EXIT_SUCCESS);
		}
		exit(EXIT_FAILURE);
}
