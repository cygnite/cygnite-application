Skeleton Application Using Cygnite Framework
============================================

Sample skeleton application using the Cygnite MVC layer - http://www.cygniteframework.com


Installation
=============
The best way to install Cygnite Framework is to download composer.phar from http://getcomposer.org/ to your local directory or to use globally on your system move it to usr/local/bin. For windows users please download and install composer setup. 

YOu may install Cygnite Framework either simply downloading skeleton application from here or you may install via composer. Composer installation is more convinient.


Composer: Create Project
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

##Composer: Install Dependencies
===============================

Enter below command in your terminal to simply update your dependencies.

    composer update

That's all you are ready to go.

##Contribute -
=============

-> Are you an experienced PHP professional and have good knowledge of Object Oriented Programming concepts?

-> Getting bored with the same kind of development ?

-> Do you want to learn something interesting also showcase your skills to entire world?

You are at the right place. We welcome you to participate on Cygnite Framework development or its documentation.

Contribute on Cygnite Framework development and grow with us. Join the team, learn, get help and help others, find, report bugs, send us your feedback, send your wishlist for new features, write and send us patches for Cygnite Framework.


##Getting Started with Cygnite -
===============================
i.  Make sure you have GitHub Account.

ii. Clearly describe the issue you find to fix shortly.

iii. Create a branch where you would like to place your changes and send the patches to us.

iv. Fork Cygnite Repository on GitHub.

v. Please follow the coding standard as followed (Resembles PSR) on the project or please request for coding standard to follow.
