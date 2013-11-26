all: main

main: main.c
	gcc -o main main.c
	@echo 'please type (as root): chown root main; chmod 4110 main; chown root:root FLAG; chmod -r FLAG'
clean:
	rm *~ *.o main
