#include <stdio.h>
#include <stdlib.h>

#define PASSWORD "jump"
int main(int argc, char** argv)
{
		if (argc != 2) {
				puts("Usage: ./defi2 <<passwd>>");
				exit(EXIT_FAILURE);
		}

		if (!strcmp(argv[1], PASSWORD)) {
						puts("Well done, now try defi2!");
						exit(EXIT_SUCCESS);
				}
				exit(EXIT_FAILURE);
}
