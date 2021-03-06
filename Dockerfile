FROM php:7.1-alpine

ADD . /project
WORKDIR /project

RUN apk add --update bash && rm -rf /var/cache/apk/* \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer \
    && composer install -n --prefer-dist \
    && curl -O -L https://phar.phpunit.de/phpunit-5.7.21.phar \
       && chmod +x phpunit-5.7.21.phar \
       && mv phpunit-5.7.21.phar /usr/local/bin/phpunit
MAINTAINER Peter Popelyshko <petrneok@gmail.com>

ENTRYPOINT ["/bin/sh", "-c"]
