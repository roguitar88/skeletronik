# Skeletronik
## Simple MVC Framework created by Rogerio Soares for study purposes

This is part of a bigger project made by a developer for developers. This is a simple open-source MVC structure for study purposes and I mean to enhance it with time and mutual collabs. Collaborators will have their names displayed on the future official website.

###### General Configuration of your Website

All the configuration of your website is inside *config/config.php*. There you can set your email credentials and database settings. It's very simple.

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

And inside our *.htaccess* we have:
```
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ /public/index.php?url=$1 [QSA,L]
```

If you want to access the project via localhost or 127.0.0.1, just do it:
```
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ /skeletronik/public/index.php?url=$1 [QSA,L]
```

Note: the *.htaccess* is already there.

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
        rewrite ^/(.*)$ /public/index.php?url=$1 last;
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

###### How routes were configured

In *src/Traits/TraitUrlParser.php*, we have this:
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

And in *src/Class/ClassRoutes* I created this method to get the route:
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

Also have a look at *app/Dispatch.php*, which is mainly responsible for treating the URL responses and controllers.

###### Git Deploy (alternative faster solution to FTP)

You can also manage all your deployment processes (via Git) through our class *ControllerDeployExec.php*, where you can create a method for each of your projects/websites. This way, you can update your development or production area/server on the click of a button. That easy!

This is possible thanks to the lib by *Jan Pecha*, available at **https://packagist.org/packages/czproject/git-php**. Just check it for further details on git settings and calls using PHP.

Moreover, you can also update you local database (corresponding to the version that is in the production/server).

Enjoy it and implement it on your websites and projects.

Author: Rogério Brito Soares

###### We need your help

Although this project is open source and freely available to the public, we also have some expenses (money and time costs). We also aim to maintaing this initiative and we immensely appreciate collaboration be it in cash or code. The link for donation is [https://www.paypal.com/donate/?hosted_button_id=LCHZQ8Q7Z579S](https://www.paypal.com/donate/?hosted_button_id=LCHZQ8Q7Z579S). If you're Brazilian, you can send us money via PIX by using this key: ***rogeriobsoares5@gmail.com***. Thank you and God bless you.

![Donate to us](https://olimppi.us/img/qr_code_donation.png)