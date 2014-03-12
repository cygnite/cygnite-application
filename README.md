Skeleton Application Using Cygnite Framework
============================================

Sample skeleton application using the Cygnite MVC layer - http://www.cygniteframework.com


Installation
=============
The best way to install Cygnite Framework is to download composer.phar from http://getcomposer.org/ to your local directory or to use globally on your system move it to usr/local/bin. For windows users please download and install composer setup. 

YOu may install Cygnite Framework either simply downloading skeleton application from here or you may install via composer. Composer installation is more convinient.


Composer: Create You Project
============================
Create your project from terminal simply entering below command -

    composer create-project cygnite/application cygnite
    or
    composer.phar create-project cygnite/application cygnite
   
after executing above command you will find cygnite folder inside your project directory. Now change cygnite/composer.json as below to download your dependencies. 

Replace -
                  
    "require": {
        "php": ">=5.3.3"
    },
    "autoload": {
       "psr-0" : {
           "Cygnite\\" : "src/"
       }
    }
    
    With - 
           
    "require": {
         "php": ">=5.3.3",
         "cygnite/framework": "1.0.6",
         "filp/whoops": "1.0.10",
         "twig/twig": "1.*",
         "symfony/console": "2.3.*"
     },
     "autoload": {
         "classmap": [
              "apps/controllers",
              "apps/models",
              "apps/components"	
         ],
         "psr-0" : {
          "Cygnite\\" : "src/"
         }
     }

Composer: Install Dependencies
===============================

Enter below command in your terminal to simply update your dependencies.

    composer update

That's all you are ready to go.

