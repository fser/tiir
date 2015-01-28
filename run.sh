#!/bin/bash
service mysql start
service php5-fpm start
mysql --defaults-file=/etc/mysql/debian.cnf < /root/tiir/conf/setup.sql
nginx -g 'daemon off;'

