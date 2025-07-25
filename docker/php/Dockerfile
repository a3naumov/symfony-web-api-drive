ARG PHP_VERSION=8.3.21-fpm-alpine3.21
ARG COMPOSER_VERSION=2.8.9

FROM composer:${COMPOSER_VERSION} as composer
FROM php:${PHP_VERSION}

# Install composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Install system dependencies
RUN apk add --no-cache \
    curl \
    git \
    bash \
    linux-headers \
    zip \
    libpq-dev \
    $PHPIZE_DEPS \
;

# Install PHP extensions
RUN docker-php-ext-install \
    pdo_pgsql \
;

# Install opcache
RUN docker-php-ext-install opcache && docker-php-ext-enable opcache
ADD ./conf/ext/docker-php-ext-opcache.ini /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

# Install xdebug
ARG INSTALL_XDEBUG=false
RUN if [ "${INSTALL_XDEBUG}" = "true" ]; then \
    pecl install xdebug && \
    docker-php-ext-enable xdebug; \
fi
ADD ./conf/ext/php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Install symfony CLI
ARG SYMFONY_CLI_ENABLED=false
RUN if [ "${SYMFONY_CLI_ENABLED}" = "true" ]; then \
    curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash && \
    apk add symfony-cli; \
fi

# Create a user and group for the application
ARG USER_NAME=www
ARG USER_ID=1000
ARG GROUP_ID=1000
RUN addgroup -g ${GROUP_ID} ${USER_NAME} && \
    adduser -D -u ${USER_ID} -G ${USER_NAME} ${USER_NAME}
USER ${USER_NAME}

# Change default user to the created user
USER ${USER_NAME}
