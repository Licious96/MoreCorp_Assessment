# Use an official PHP runtime as the base image
FROM php:8.0-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Install PHP extensions and dependencies
RUN docker-php-ext-install pdo pdo_mysql

# Copy composer files to the working directory
COPY composer.json composer.lock ./

# Install app dependencies
RUN composer install --no-scripts --no-autoloader

# Copy the rest of the app's source code to the container
COPY . .

# Generate the autoloader
RUN composer dump-autoload --optimize

# Expose the port that the Laravel app will run on
EXPOSE 80

# Define the command to run the Apache web server
CMD ["apache2-foreground"]
