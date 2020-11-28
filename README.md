# Skeletronik
## Simple MVC Framework created by Rogerio Soares for study purposes

This is part of a bigger project made by a developer for developers. This is a simple open-source MVC structure for study purposes and I mean to enhance it with time and mutual collabs. Collaborators will have their names displayed on the future official website.

###### General Configuration of your Website

All the configuration of your website is inside config/config.php. There you can set your email credentials and database settings. It's very simple.

###### Apache Configuration
```
<VirtualHost *:80> 
    DocumentRoot "C:/laragon/www/skeletronik/"
    ServerName skeletronik.test
    ServerAlias *.skeletronik.test
    <Directory "C:/laragon/www/skeletronik/">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

And inside our .htaccess we have:
```
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ /public/index.php?url=$1 [QSA,L]
```

Note: the .htaccess is already there.

###### Nginx Configuration
```
server {
    listen 80;
    server_name skeletronik.test *.skeletronik.test;
    root "C:/laragon/www/skeletronik/";
    
    index index.html index.htm index.php;
 
	  rewrite_log on;
	
    location / {
      if (!-f $request_filename) {
        rewrite ^(.*)$ /public/index.php?url=$uri$is_args$args last;
        break;
      }
    }
    
    location ~ \.php$ {
      try_files $uri /index.php =404;
      fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;  #Check PHP version installed
      fastcgi_index index.php;
      fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
      include fastcgi_params;
    }
	
    charset utf-8;
	
    location = /public/favicon.ico { access_log off; log_not_found off; }
    location = /public/robots.txt  { access_log off; log_not_found off; }
    
    location ~ /\.ht {
        deny all;
    }
}

```

Note: When using Nginx server, I detected there's an issue with the routes (friendly URL). For example: http://skeletronik.test/?url=login is working, but not http://skeletronik.test/login, and I'll explain more about it below.

###### How routes were configured

In src/Traits/TraitUrlParser.php, we have this:
```
namespace Src\Traits;

trait TraitUrlParser {

    #it divides the url into an array
    public function parseUrl()
    {
        //Here we treat the URL rules according to the .htaccess rules
        return explode("/", rtrim($_GET['url']), FILTER_SANITIZE_URL);
    }

}
```

And in src/Class/ClassRoutes I created this method to get the route:
```
    #Method for returning the route
    public function getRoute()
    {
        $url = $this->parseUrl();
        $i = $url[0];

        #Here you set the routes according to the controllers
        $this->route = array(
            "" => "ControllerHome",
            "home" => "ControllerHome",
            "login" => "ControllerLogin",
            "register" => "ControllerRegister"
        );

        if (array_key_exists($i, $this->route)) {
            if (file_exists(DIRREQ."app/Controller/{$this->route[$i]}.php")) {
                return $this->route[$i];               
            } else {
                return "ControllerHome";
            }
        } else {
            return "Controller404";
        }

    }
```

Also check app/Dispatch.php, which is the mainly responsible for treating the URL responses and controllers:

Enjoy it and implement it on your websites and projects.

Author: Rogério Brito Soares
