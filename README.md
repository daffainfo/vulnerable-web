# Vulnerable Web

## Description
Simple vulnerability labs that created using PHP and MySQL.

**Not for sale**

List of vulnerability:
* Arbitrary File Upload
* SQL Injection
* CSRF
* IDOR
* Host Header Injection
* Local File Inclusion
* Open Redirect
* Cross-Site Scripting
* CRLF Injection

## Notes Vulnerability
### Host Header Injection
You need to change the email and password at `/users/cek-forgot-password.php` in line 33,34, and 38

## Pre Requisite
  - mysql-server
  - php8.1-fpm
  - php8.1-mysql
  - php8.1
  - nginx

## Installation (Manual)
```
$ cd /var/www/html
$ git clone https://github.com/daffainfo/vulnerable-web
$ cd vulnerable-web
$ mysql -u user -p name_db < conf/database.sql
$ cp conf/default /etc/nginx/sites-enabled/default
$ chown -R www-data:www-data /var/www/html/
$ chmod -R 777 /var/www/html
```