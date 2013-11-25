all:	defi1 defi2

defi1: defi1.c
	gcc -o defi1 defi1.c

defi2:	defi2.c
	gcc -o defi2 defi2.c
	@echo 'please run (as root) chown root defi2; chmod 4110 defi2'

clean:
	rm *~ *.o defi1 defi2
