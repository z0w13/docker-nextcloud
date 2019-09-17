FROM alpine:3.10

ARG CADDY_UID=1000
ARG CADDY_GID=1000

RUN apk add --no-cache caddy

RUN addgroup -S -g${CADDY_GID} web \
 && adduser -DS -u${CADDY_UID} web

COPY Caddyfile /etc/caddy/Caddyfile

USER web
CMD ["/usr/sbin/caddy", "-conf", "/etc/caddy/Caddyfile"]
