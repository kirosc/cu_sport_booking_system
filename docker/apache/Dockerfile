FROM ubuntu:bionic

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y --no-install-recommends apt-utils
RUN apt-get install -y locales && locale-gen "en_US.UTF-8"
RUN DEBIAN_FRONTEND=noninteractive dpkg-reconfigure locales

RUN sed -i -e 's/# en_US.UTF-8 UTF-8/en_US.UTF-8 UTF-8/' /etc/locale.gen && \
    locale-gen

ENV APACHE_CONF_DIR=/etc/apache2 \
    PHP_CONF_DIR=/etc/php/7.3 \
    PHP_DATA_DIR=/var/lib/php
        
RUN     \
        BUILD_DEPS='software-properties-common' \
    && dpkg-reconfigure locales \
        && apt-get install --no-install-recommends -y $BUILD_DEPS \
        && add-apt-repository -y ppa:ondrej/php \
        && add-apt-repository -y ppa:ondrej/apache2 \
        && apt-get update \
    && apt-get install -y curl vim apache2 libapache2-mod-php7.3 php7.3-cli php7.3-readline php7.3-mbstring php7.3-zip php7.3-intl php7.3-xml php7.3-json php7.3-curl php7.3-gd php7.3-pgsql php7.3-mysql php-pear \
        # Apache settings
    && cp /dev/null ${APACHE_CONF_DIR}/conf-available/other-vhosts-access-log.conf \
    && rm ${APACHE_CONF_DIR}/sites-enabled/000-default.conf ${APACHE_CONF_DIR}/sites-available/000-default.conf \
    && a2enmod rewrite php7.3 \
        # Cleaning
        && apt-get purge -y --auto-remove $BUILD_DEPS \
        && apt-get autoremove -y \
        && rm -rf /var/lib/apt/lists/* \
        # Forward request and error logs to docker log collector
        && ln -sf /dev/stdout /var/log/apache2/access.log \
        && ln -sf /dev/stderr /var/log/apache2/error.log \
        && chown www-data:www-data ${PHP_DATA_DIR} -Rf
        
ENV DEBIAN_FRONTEND=teletype
        
COPY ./apache2.conf ${APACHE_CONF_DIR}/apache2.conf
COPY docker/apache/entrypoint.sh /sbin/entrypoint.sh
RUN chmod 755 /sbin/entrypoint.sh

WORKDIR /var/www/html/

EXPOSE 80 443
        
CMD ["/sbin/entrypoint.sh"]
