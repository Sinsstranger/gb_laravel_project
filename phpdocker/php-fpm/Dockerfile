FROM phpdockerio/php:8.2-fpm
WORKDIR "/var/www/laravel"

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        git \
        curl \ 
        php8.2-mysql \ 
        php8.2-redis \ 
        php8.2-xdebug \
    &&  curl -fsSL https://deb.nodesource.com/setup_lts.x | bash - &&\
        apt-get install -y nodejs \
    && corepack enable \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
