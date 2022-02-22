# Senior Project CS-475

## Description
This Money Opportunity Web Application wil include tasks and files that were completed by Gaganpreet Kaur, Nathaniel Rowe,and Veronica Stewart. There will be updates included along with progress of finalzing their project to allow users to use their web application to be able to get inforamtion about how they can save for retirmement based on receiving data from the user such as how much income do they have, savings, intrests, etc. Also users will be able to recieve information about jobs searches that intrests them.


## Tech Stack
This project is developed using the LAMP Stack.
Linux
Apache
PHP
MySQL
PHP

## Tech Setup
To setup this application, you would need either a LAMP stack, XAMP, or docker setup. You can see below instructions for Docker setup.

## Docker Setup
1. Install Docker Desktop - https://www.docker.com/products/docker-desktop
2. After Docker is installed, restart your machine. Make sure you follow the steps from Docker site to correctly install the software to avoid any issues in next steps.
3. Go inside /money-app/ and follow these commands: 
    a) cp sample.env .env
    b) docker-compose up -d
4. At this point, you should have the docker containers running. You can check it by type `docker ps` command
5. Setup Laravel dependencies by following these commands
    a) docker exec -it lamp-php8 /bin/bash
    b) cd laravel-app
    c) composer install
    d) cp .env.example .env
    e) php artisan key:generate
6. Open Code Editor and navigate to laravel-app/.env file. In this .env file, location DB_CONNECTION block and replace it with the following
    DB_CONNECTION=mysql
    DB_HOST=database
    DB_PORT=3306
    DB_DATABASE=money_app
    DB_USERNAME=root
    DB_PASSWORD=tiger
5. Now, you should be able to access the site by going to http://localhost/ on your machine  

## Folder Structure and description
money-app - This is the main application folder.
project_docs - This folder will contain all the project related documents like SRS, diagrams, ERD, etc.

/money-app/www/laravel-app - This folder contains Laravel 9.x setup. This is where all the code should be. You can read more about Laravel 9.x directory structure. https://laravel.com/docs/9.x/structure