#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <ctype.h>
#include <string.h>

#define MAX_CMD_LEN 512
#define FORBIDDEN_CHAR ";\"| /\\'><"
unsigned char command[MAX_CMD_LEN];
unsigned char wrapped_command[MAX_CMD_LEN + 42];

void sanitize(unsigned char* buffer, size_t len)
{
		int i = 0;
		for (i=0; i<len; ++i)
				if(strchr(FORBIDDEN_CHAR, buffer[i])) {
						buffer[i] = 0;
						return;
				}
}

int main(int argc, char** argv)
{
		setuid(0);
		printf("File to cat > ");
		fflush(stdout);
		size_t len = read(STDIN_FILENO, command, MAX_CMD_LEN);
		command[len-1] = 0;
		sanitize(command, len);

		sprintf(wrapped_command, "/bin/cat %s", command);
		if (strlen(command)>0) {
				if (!strcmp("FLAG", command)) {
						fprintf(stderr, "I won't print FLAG file! :))\n");
						exit(EXIT_FAILURE);
				}
				execl("/bin/sh", "sh", "-c", wrapped_command, (char*)NULL);
		}

		fprintf(stderr, "Error, invalid filename!\n");
		exit (EXIT_FAILURE);
}
