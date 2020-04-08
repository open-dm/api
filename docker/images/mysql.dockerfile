FROM mysql:5.7

COPY ./docker/config/mysql.conf /etc/mysql/conf.d/opendm.cnf
