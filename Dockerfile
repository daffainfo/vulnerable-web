FROM ubuntu:latest

# Set non interactive
ARG DEBIAN_FRONTEND=noninteractive

# Set 2 env variables
ARG email
ENV env_email $email

ARG password_email
ENV env_password $password_email

# Install dependencies
RUN apt-get update && apt-get install -y \
  nginx \
  php8.1-mysql \
  php8.1-fpm \
  php8.1 \
  mysql-server

# Download and extract WordPress
COPY app /var/www/html

# Change permission
RUN chown -R www-data:www-data /var/www/html/
RUN chmod -R 777 /var/www/html/

# Set home directory for MySQL
RUN service mysql stop && usermod -d /var/lib/mysql/ mysql

# Copy nginx and sql
COPY conf/default /etc/nginx/sites-enabled/default
COPY conf/database.sql .

# Configure MySQL and Restore DB
RUN service mysql start && \
  mysql -u root -e "CREATE DATABASE vulnweb;" && \
  mysql -u root -e "CREATE USER 'vulnerableweb'@'%' IDENTIFIED BY 'vulnerableweb';" && \
  mysql -u root -e "GRANT ALL PRIVILEGES ON vulnweb.* TO 'vulnerableweb'@'%';" && \
  mysql -u root -e "FLUSH PRIVILEGES;" && \
  mysql -u vulnerableweb -pvulnerableweb vulnweb < database.sql

RUN rm database.sql

# Expose NGINX and MySQL ports
EXPOSE 80 3306

# Start NGINX and MySQL
COPY startup.sh .
RUN chmod 700 startup.sh
CMD ["/bin/bash","-c","./startup.sh"]
