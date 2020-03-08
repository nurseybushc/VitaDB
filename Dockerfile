FROM trafex/alpine-nginx-php7
COPY . /var/www/html

#RUN apk add --no-cache bash