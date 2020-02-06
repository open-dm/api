FROM open-dm/core:composer

WORKDIR /var/www/html

RUN apt-get install -y software-properties-common

RUN apt-get update && \
    apt-get install -y git && \
    apt-get install -y vim && \
    apt-get install -y nano
