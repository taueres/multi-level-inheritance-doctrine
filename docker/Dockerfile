FROM debian
RUN apt-get update #forced
RUN apt-get install -y apt-utils
RUN apt-get install -y apache2 php5 php5-mysql
RUN apt-get install -y curl vim

RUN echo "date.timezone = Europe/Rome" >> /etc/php5/apache2/php.ini
RUN echo "date.timezone = Europe/Rome" >> /etc/php5/cli/php.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer

CMD apache2ctl -D FOREGROUND
