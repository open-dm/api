FROM nginx:latest

WORKDIR /var/www/html

COPY ./docker/config/nginx.conf /etc/nginx/nginx.conf
