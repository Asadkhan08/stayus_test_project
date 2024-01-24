FROM php:8.2.0-apache
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite 

#COPY src/ /var/www/
COPY ./ /var/www/html
RUN  chown -R www-data:www-data /var/www/html
RUN docker-php-ext-install mysqli pdo_mysql
COPY php.ini /usr/local/etc/php/conf.d