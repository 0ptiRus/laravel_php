FROM php:8.2-fpm 

ARG DOCKER_ID=501
ARG DOCKER_GID=501

# Create a group and user
RUN groupadd -g $DOCKER_GID docker && \
    useradd -g $DOCKER_GID -u $DOCKER_ID --create-home docker

# Copy the entrypoint script
COPY .docker/app/docker-entrypoint.sh /docker-entrypoint.sh

# Make the entrypoint script executable
RUN chmod +x /docker-entrypoint.sh

# Install dependencies
RUN apt-get update && \
    apt-get install -y libpq-dev zip && \
    docker-php-ext-configure pdo_pgsql && \
    docker-php-ext-install pdo_pgsql

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

# Switch to the docker user
USER docker

# Set the entrypoint
ENTRYPOINT ["/docker-entrypoint.sh"]
