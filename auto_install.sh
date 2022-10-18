docker-compose down
docker-compose build
docker-compose up -d
docker-compose exec app composer install
docker-compose exec app cp .env.example .env
docker cp config.cnf mysql:/config.cnf
docker cp init.sh mysql:/init.sh
docker exec mysql bash /init.sh
docker-compose exec app php migrations.php