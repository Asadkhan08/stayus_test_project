FROM php:latest

# setup user as root
USER root

WORKDIR /var/www

# # setup node js source will be used later to install node js
# RUN  apt-get update &&  apt-get install -y ca-certificates curl gnupg
# RUN  apt-get update && apt-get install -y ca-certificates curl gnupg 
# RUN curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key |  gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg
# RUN echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg]
# RUN  curl -sL https://deb.nodesource.com/setup_20.x -o nodesource_setup.sh
# RUN ["sh",  "./nodesource_setup.sh"]

#GitLab webhook testing 2

# Install environment dependencies
# RUN apt-get update \
# 	# gd
# 	&& apt-get install -y build-essential  openssl nginx libfreetype6-dev libjpeg-dev libpng-dev libwebp-dev zlib1g-dev libzip-dev gcc g++ make vim unzip curl git jpegoptim optipng pngquant gifsicle locales libonig-dev nodejs  \
# 	&& docker-php-ext-configure gd  \
# 	&& docker-php-ext-install gd \
# 	# gmp
# 	&& apt-get install -y --no-install-recommends libgmp-dev \
# 	&& docker-php-ext-install gmp \
# 	# pdo_mysql
# 	&& docker-php-ext-install pdo_mysql mbstring \
# 	# pdo
# 	&& docker-php-ext-install pdo \
# 	# opcache
# 	&& docker-php-ext-enable opcache \
# 	# exif
#     && docker-php-ext-install exif \
#     && docker-php-ext-install sockets \
#     && docker-php-ext-install pcntl \
#     && docker-php-ext-install bcmath \
# 	# zip
# 	&& docker-php-ext-install zip \
# 	&& apt-get autoclean -y \
# 	&& rm -rf /var/lib/apt/lists/* \
# 	&& rm -rf /tmp/pear/

# Copy files
COPY . /var/www

# COPY ./deploy/local.ini /usr/local/etc/php/local.ini

# COPY ./deploy/conf.d/nginx.conf /etc/nginx/nginx.conf
 COPY ./nginx.conf /etc/nginx/nginx.conf

RUN chmod +rwx /var/www

RUN chmod -R 777 /var/www

RUN chmod -R +rw /var/www/storage/

# setup FE
# RUN npm install

# RUN npm rebuild node-sass

# RUN npm run prod

# setup composer and laravel
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# RUN composer install --working-dir="/var/www"

# RUN composer dump-autoload --working-dir="/var/www"
EXPOSE 80

RUN ["chmod", "+x", "post_deploy.sh"]

# CMD [ "sh", "./post_deploy.sh" ]
# CMD php artisan serve --host=127.0.0.1 --port=9000