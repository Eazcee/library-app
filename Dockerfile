FROM php:8.1-apache

RUN a2enmod rewrite

# Install necessary PHP extensions
RUN apt-get update && apt-get install -y libicu-dev && docker-php-ext-install intl mysqli pdo pdo_mysql

# Copy project files
COPY . /var/www/html

# Set correct Apache DocumentRoot to public/
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
