FROM nextcloud:18.0.9-fpm-alpine
#RUN rm -vf /usr/local/etc/php-fpm.d/*.conf
COPY www.conf /usr/local/etc/php-fpm.d/zzz-override.conf
COPY user.config.php /usr/src/nextcloud/config/user.config.php

RUN sed -i 's#set -eu#set -eu\n(tail -F /var/log/fpm.log)\&#' /entrypoint.sh
RUN touch /var/log/fpm.log \
 && chmod 777 /var/log/fpm.log
