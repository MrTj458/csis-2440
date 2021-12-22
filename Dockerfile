FROM php:apache

RUN apt update
RUN apt install mysql-common
RUN docker-php-ext-install mysqli
