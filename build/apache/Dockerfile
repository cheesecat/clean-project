FROM ubuntu:latest

MAINTAINER Paweł Galerczyk <pawel@napoleoncat.com>

RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
        tzdata apache2 openssl ca-certificates\
    && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite
RUN a2enmod ssl
RUN a2enmod proxy_http
RUN a2enmod proxy_fcgi
RUN a2enmod headers
RUN a2enmod proxy_wstunnel

RUN openssl req -new -newkey rsa:4096 -days 3650 -nodes -x509 -subj \
    "/C=PL/ST=Mazowieckie/L=IT/O=NapoleonCat/CN=*.napoleoncat.com" \
    -keyout /tmp/ssl.key -out /tmp/ssl.crt

RUN mkdir /etc/apache2/ssl
RUN cp /tmp/ssl.crt /etc/apache2/ssl/ssl.crt
RUN cp /tmp/ssl.key /etc/apache2/ssl/ssl.key

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

# Copy apache vhost file to proxy php requests to php-fpm container
COPY nap.conf /etc/apache2/sites-enabled/nap.conf
COPY superadmin.conf /etc/apache2/sites-enabled/superadmin.conf
COPY php7.2-fpm.conf /etc/apache2/conf-enabled/php7.2-fpm.conf

# Expose apache.
EXPOSE 443
# By default start up apache in the foreground, override with /bin/bash for interative.
CMD /usr/sbin/apache2ctl -D FOREGROUND