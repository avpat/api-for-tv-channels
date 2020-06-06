docker-compose exec php php artisan key:generate
docker-compose exec php php artisan config:cache



-- 1. connect to the database and grant privileges on simplestream database
docker-compose exec mysql bash

GRANT ALL PRIVILEGES ON `simplestream`.* TO 'homestead'@'localhost';

-- 2 . migrate

docker-compose exec php php artisan migrate


--- add code sniffer for psr12 standards
composer require squizlabs/php_codesniffer --dev

-- create a model and factory for channel
    docker-compose exec php php artisan make:model Channel -mf
    
-- migrate and seed
    docker-compose exec php php artisan make:seed  ChannelTableSeeder
    docker-compose exec php php artisan migrate
    docker-compose exec php php artisan db:seed

-- create controller    
     docker-compose exec php php artisan make:controller ChannelController

