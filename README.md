# AppStrap BoilerPlate README

AppStrap is a CodeIgniter boilerplate to get you running in minutes. Include CodeIgniter 2.1.3, HTML5 BoilerPlate, Twitter Bootstrap & more.
AppStrap is easy to get running on Heroku in under a minute with a few simple commands
    
    $ git init appstrap_boilerplate
    $ cd appstrap_boilerplate
    $ git pull git@github.com:winglian/appstrap.git
    $ heroku apps:create -b git://github.com/winglian/heroku-buildpack-php#appstrap
    $ git push heroku

## Installing Composer Dependencies

At the root of the project run:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install --prefer-dist

I've included composer.lock as part of the boilerplate/repo so that the initial install will finish quicker instead of waiting for dependencies to resolve. To update the composer.lock, simply run:

    $ php composer.phar update

## Includes

+   CodeIgniter 2.1.3
+   Twig 1.11.*
+   Underscore 1.4.3
+   Backbone 0.9.9
+   jQuery 1.8.3
+   HTML5 Shiv 3.6.1
+   require.js 2.1.2
+   Bootstrap 2.2.2
