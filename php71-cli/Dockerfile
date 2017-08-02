FROM php:7.1-cli

MAINTAINER Denis Negometyanov <denis.negometyanov@gmail.com>

RUN apt-get update && apt-get install -y curl \
    libfreetype6-dev libmcrypt-dev \
    && docker-php-ext-install iconv mcrypt \
    && docker-php-ext-install zip \
    && docker-php-ext-install opcache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

RUN composer global require "phpunit/phpunit"
ENV PATH /root/.composer/vendor/bin:$PATH
RUN ln -s /root/.composer/vendor/bin/phpunit /usr/bin/phpunit

RUN ls -la /usr/local

WORKDIR /code

CMD ["tail", "-f", "/dev/null"]
