FROM nextcloud:21.0.9-fpm-alpine

COPY www.conf /usr/local/etc/php-fpm.d/zzz-override.conf
COPY user.config.php /usr/src/nextcloud/config/user.config.php

RUN sed -i 's#set -eu#set -eu\n(tail -F /var/log/fpm.log)\&#' /entrypoint.sh
RUN touch /var/log/fpm.log \
 && chmod 777 /var/log/fpm.log
