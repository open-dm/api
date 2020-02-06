FROM mysql:8

COPY ./docker/config/mysql.conf /etc/mysql/conf.d/opendm.cnf
