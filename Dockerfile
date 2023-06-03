# the different stages of this Dockerfile are meant to be built into separate images
# https://docs.docker.com/compose/compose-file/#target

ARG PHP_VERSION=8.2

FROM php:${PHP_VERSION}-fpm-alpine AS oanda_client_php

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# persistent / runtime deps
RUN apk add --no-cache \
		acl \
		file \
		gettext \
		git \
		openssh \
		make \
	;

RUN chmod +x /usr/local/bin/install-php-extensions; \
    install-php-extensions intl pdo_mysql zip apcu xdebug opcache @composer

RUN ln -s $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini
COPY docker/php/conf.d/mab05k-oanda-client.ini $PHP_INI_DIR/conf.d/mab05k-oanda-client.ini

# https://getcomposer.org/doc/03-cli.md#composer-allow-superuser
ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /srv

# build for production
ARG APP_ENV=prod

VOLUME /srv/var

COPY docker/php/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

ENTRYPOINT ["docker-entrypoint"]
CMD ["php-fpm"]
