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
3. Go inside /money-app/ and run docker-compose up -d
4. Install Composer from https://getcomposer.org/download/. You can skip this step and run the next step install the docker container
5. Install composer dependencies: 
    a. Go inside money-app/www/laravel-app/
    b. Run composer install
5. Now, you should be able to access the site by going to localhost on your machine  

## Folder Structure and description
money-app - This is the main application folder.
project_docs - This folder will contain all the project related documents like SRS, diagrams, ERD, etc.

/money-app/www/laravel-app - This folder contains Laravel 9.x setup. This is where all the code should be. You can read more about Laravel 9.x directory structure. https://laravel.com/docs/9.x/structure