# NextDeveloper Authentication Platform

This authentication platform is an open source version of a Laravel Passport supported OAuth authentication engine. This engine is based on the NextDeveloper IAM service and has various different authentication mechanisms. Please take a look at IAM module for more information.



## About NextDeveloper Platform

Since we do have multiple teams on working multiple modules or projects (lets say), we had to find a way to work
together, as well as build a software that can be deployed all together. That is why came up with modular development
strategy.

### Who is NextDeveloper?
NextDeveloper is a team of developers from Netherlands, that is focusing on project management and high quality development.
This team has been working on automation and orchestration vertical for years, and we thought that it would be fun to
spin-off from the tech company called PlusClouds (Release the kraken!).
During these years we have been trying to find out the techniques for fast and bug free development.

### Modular development strategy

For that reason
in our automation projects we use Laravel to handle API requests and to make this strategy real, we came up with certain 
additional standarts to our own Laravel Platform. These standarts involves rules and templates that will 
help us to reduce the amount of actual coding, easing the actual learning curve and to reduce cost of development while
creating new module or a feature.

**Note that:** We are constantly maintaining this library so feel free to use it anywhere.

For instance according to our coding standarts, in a project there can be a platform, under that a module (or
product name), and feature of that product. Under the features, the applicaton development varies according the the need.

Thanks to this we can split products or sub projects (or modules) into different packages. To add other packages to the
application is as easy as adding the package name to the composer;

```
    "require": {
    ... 
        "nextdeveloper/account": "v1.*",
        "nextdeveloper/core": "v1.*",
    ...
    }
```

### Components

- PHP8.2
- Laravel
- Laravel Octane

### Modules
- nextdeveloper/iam
- nextdeveloper/commons
- nextdeveloper/i18n

To clone these modules you can use the code below. But before that please go to the folder you want to place these libraries;

```
mkdir NextDeveloper
cd NextDeveloper
git clone git@github.com:nextdeveloper-nl/iam.git IAM
git clone https://github.com/nextdeveloper-nl/commons Commons
git clone git@github.com:nextdeveloper-nl/i18n.git I18n
```

### Running the project

#### Development mode
In development mode, first you need to clone the packages to an appropriate folder in your projects environment. Placing the NextDevleoper modules under NextDeveloper folder is advised. Since all the team is using the same composer, you dont need to customize anything in the project. However you can always choose to place them in another directory.

To run this project, you will need the components above. Please make sure that they are in the right folder and make sure that you can reach to those modules.

If everything is set up, please run the composer install and then boot the application;

```
composer install
php artisan serve
```

In production mode;
```
composer install
php artisan octane:start
```
