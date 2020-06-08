## Code Test


What is included in this repo?
- Completed code
- EER diagram
- Postman file [![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/75865b4398b822df3597)
- Database migrations and seedrs
- basic unit tests
- Installation guide (docker, laravel and database)
- .env files will be emailed to you(if needed)

**if above postman button doesn't work then please let me or Agency know**
<https://www.getpostman.com/collections/75865b4398b822df3597>

Installation instructions
1. Clone the repo via this url git@https://github.com/swaami/simplestream-api-test
2. Get inside the project folder and run ``composer update``
3. Create a .env file by running the following command cp .env.example .env. Update your database credentials inside this .env file.
4. Install various packages and dependencies: composer install. Note: you have to be inside your Laravel development environment for this to work. 
5. Run `` docker-compose build && docker-compose up -d`` (please refer to section below if any problem persists)
5. Generate an encryption key for the app: php artisan key:generate.
6. Run migrations and seed database with some sample data: php artisan migrate:refresh --seed.
7. You are now good to go.

##Additional Information: 

The project uses following environment 
- docker -- linux, apache, mysql, nginx, php 7.4
- Laravel 7
- composer

## Composer Libraries
- codesniffer
- goldspecdigital/laravel-eloquent-uuid

##Docker Installation(optional)
- In case, you do not have docker or vagrant installed then follow these steps. If you've working environment then simply ignore docker installation steps and ``docker-compose exec php`` from all command below. 
- Run a docker desktop on your machine
- Goto your development folder and download this code
- Run a docker build command and it should copy all the required images
`` docker-compose build && docker-compose up -d``
- Check if the docker container is running with following command
``docker-compose ps``
- If any issue occurs execute ``docker-compose down -v `` and then once again execute `` docker-compose build && docker-compose up -d``
- if any issue occurs check folder perssions from the docker desktop
- if everything ok then execute ``docker-compose exec php php artisan config:cache``

##composer(already added these packages)
- add code sniffer for psr12 standards checking
``composer require squizlabs/php_codesniffer --dev``
- to check PSR12 standards run ``./vendor/bin/phpcs app/ --standard=PSR12``
- for uuid generation package, please run following command 
``composer require goldspecdigital/laravel-eloquent-uuid:^7.0``

##Create Database
- the database connection details can be found in the .env file at the root folder
- This project uses mysql(for given task) and sqlite(for unit testing). 
- create a user on the mysql by executing following command ``docker-compose exec mysql bash``
- Login to mysql bash here with ``mysql -u root -p``. 
- The password is the word `secret`
- ``create database simplestream;``
- ``GRANT ALL PRIVILEGES ON `simplestream`.* TO 'homestead'@'localhost';``
- ``exit``

##Migrate and seed database
- The factory and migration files are provided along with this repo
- to run the migrations, run 
``docker-compose exec php php artisan migrate``
- Then seed
``    docker-compose exec php php artisan db:seed``

If you face any issue with migrate and seeding then follow these steps
- Rollback 
``docker-compose exec php php artisan migrate:rollback``
``composer dump-autoload``
``docker-compose exec php php artisan migrate:refresh --seed``

##API  
- Version V1

#Endpoints
- Task 1 : endpoint: /v1/channels : list all channels. Eg,
- <http://api.localhost:8080/v1/channels/93166bc8-b0c7-38c2-a492-e43996ba222c/programmes/fb8c57f5-4bff-3716-a926-9e514d41bcf5>

- Task 2 : endpoint: /v1/channels/{channel-uuid}/{date}/{timezone}
- <http://api.localhost:8080/v1/channels/93166bc8-b0c7-38c2-a492-e43996ba222c/2020-06-07/Asia/Kolkata>

- Task 3 : endpoint: /v1/channels/{channel-uuid}/programmes/{programme-uuid}
- <http://api.localhost:8080/v1/channels/93166bc8-b0c7-38c2-a492-e43996ba222c/programmes/fb8c57f5-4bff-3716-a926-9e514d41bcf5>


#UNIT TESTS
- From the terminal run  
`` docker-compose exec php php artisan test`` 
- on this docker container, do not have xdebug configured so coverage is not possible. 
``docker-compose exec php vendor/bin/phpunit --coverage-html reports/``


