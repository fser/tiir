#include <stdio.h>
#include <unistd.h>
#include <string.h>

void run_me()
{
		execl("/bin/sh", "sh", (char*)NULL);
}
int i;

void fun(char* arg)
{
		unsigned char help[20];
		strcpy(help, arg);
		return;
}
int main(int argc, char** argv)
{
		if (argc==2) {
				setuid(0);
				fun(argv[1]);
				return 0;
		}
		return 1;
}
