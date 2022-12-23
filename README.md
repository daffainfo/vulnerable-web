# Vulnerable Web

## Description
Simple vulnerability labs that created using PHP and MySQL. (**Not for sale**)

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
- ### Host Header Injection
You need to import `env_email` and `env_password` in order to make Host Header Injection work

## Pre Requisite
  - mysql-server
  - php8.1-fpm
  - php8.1-mysql
  - php8.1
  - nginx

## Installation (Manual)
```
$ docker build -t vulnerable-web:latest --build-arg email=changeme@gmail.com --build-arg password_email=changeme .
$ docker run -p80:80 --name vulnerable-web -d -t vulnerable-web:latest
$ curl "http://localhost:80"
```

## Installation (Docker Hub)
```
$ docker run -p80:80 --name vulnerable-web -t daffainfo/vulnerable-web:latest
$ curl "http://localhost:80"
```