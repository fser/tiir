all: defi1	defi2

defi1:	defi1.c
	gcc -o defi1 defi1.c

defi2: defi2.c
	gcc -o defi2 defi2.c
	@echo 'please, as root type: chown root ./defi2 ; chmod u+s ./defi2'



clean:
	rm *~ *.o defi1 defi2
