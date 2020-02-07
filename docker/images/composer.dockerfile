FROM open-dm/core:php

WORKDIR /app

RUN apt-get update && \
    apt-get install -y git

RUN curl --silent --show-error https://getcomposer.org/installer -o composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer

RUN apt-get install -y unzip
