FROM debian:stable
MAINTAINER François Serman <francois.serman@lifl.fr>
RUN apt-get update && apt-get -y -qq install mysql-server nginx php5-fpm php5-mysql git-core
RUN service mysql start; cd /root; git clone -b telecom https://github.com/fser/tiir.git ; cd tiir/conf ; cp nginx.conf /etc/nginx/sites-enabled/tiir.conf;  mysql --defaults-file=/etc/mysql/debian.cnf < setup.sql ; mkdir -p /home/srs ; cd .. ; cp -R www/src /home/srs/www; chown -R www-data:www-data /home/srs
ADD      run.sh   /
CMD      /run.sh
EXPOSE   80

