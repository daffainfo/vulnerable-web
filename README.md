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
* Open Redirect
* Cross-Site Scripting
* CRLF Injection (Check next section)

## Nginx configuration
```
server {
        listen 80 default_server;
        listen [::]:80 default_server;

        root /var/www/html;

        index index.php index.html index.htm index.nginx-debian.html;

        server_name _;
        
        location / {
                try_files $uri $uri/ =404;
        }

        location /img {
                return 302 $host$uri;
                # auth_basic "Restricted Content";
                # auth_basic_user_file /etc/nginx/.htpasswd;
        }

        location ~ \.php$ {
                include snippets/fastcgi-php.conf;
                fastcgi_pass unix:/run/php/php8.1-fpm.sock;
        }
}
```

## How to Install?
1. Clone this repository at `/var/www/html`
2. Replace `sites-enabled/default` content with `nginx.conf` file
3. Import the database
4. Enjoy!