FROM phpdockerio/php56-fpm:latest
#WORKDIR "/application"
WORKDIR "/test-app"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install  php5-mysql \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
    && apt-get update && apt-get install -y --no-install-recommends apt-utils


