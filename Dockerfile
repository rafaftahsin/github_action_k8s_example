FROM php:7.4-apache
ARG DEBIAN_FRONTEND=noninteractive
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
COPY ./ /var/www/html/
