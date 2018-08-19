FROM ubuntu:16.04
MAINTAINER Marius Ignat <marius.ignat@gmail.com>

# Environment variables
ENV MYSQL_ROOT_PASSWORD=root
ENV default-authentication-plugin=mysql_native_password

# Create Database
RUN	mkdir /usr/sql
RUN	chmod 644 /usr/sql

ADD payload.sql /var/sql

#RUN /etc/init.d/mysql start
RUN mysql -u root -p${MYSQL_ROOT_PASSWORD} -e "CREATE DATABASE pycom_dashboard;"
RUN mysql -u root -p${MYSQL_ROOT_PASSWORD} -D pycom_dashboard < /usr/sql/payload.sql



