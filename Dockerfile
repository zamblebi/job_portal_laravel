FROM ubuntu:focal

RUN apt-get update && apt-get -y upgrade && DEBIAN_FRONTEND=noninteractive apt-get -y install
RUN apt-get -y install apache2 php openssl php-common php-curl php-json php-mbstring php-mysql php-xml php-zip libapache2-mod-php php-cli unzip
RUN apt-get -y install git vim htop


COPY . /var/www/bigtech
COPY ./config-apache/apache-config.conf /etc/apache2/sites-enabled/000-default.conf

RUN a2enmod rewrite

WORKDIR /var/www/html

EXPOSE 80
CMD apachectl -D FOREGROUND