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
You need to change the email and password at `/user/cek-forgot-password.php` in line 33,34, and 38

## Pre Requisite
1. Install some package first
   - mysql-server
   - php8.1-fpm
   - php8.1-mysql
   - php8.1
   - nginx
2. Import the database using `mysql -u user -p db < backup.sql` and then change the database information in `config.php`
3. Replace `/etc/nginx/sites-enabled/default` content with `nginx.conf` file

## Installation
```
$ cd /var/www/html
$ git clone https://github.com/daffainfo/vulnerable-web
$ chown -R www-data:www-data /var/www/html/
$ chmod -R 777 /var/www/html
```