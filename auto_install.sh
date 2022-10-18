docker-compose down
docker-compose build
docker-compose up -d
docker-compose exec app composer install
docker-compose exec app cp .env.example .env
docker exec mysql bash /script/init.sh
docker-compose exec app php migrations.php