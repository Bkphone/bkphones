docker-compose down
docker-compose build
docker-compose up -d
docker-compose exec app composer install
docker-compose exec app cp .env.example .env
docker-compose exec app php migrations.php