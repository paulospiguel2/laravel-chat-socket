up:
	docker-compose up -d
down:
	docker-compose down
down-all:
	docker-compose down --rmi all --volumes
build:
	docker-compose up -d --build
setup-laravel:
	docker-compose exec app php artisan key:generate
	docker-compose exec app php artisan storage:link
	docker-compose exec app chmod -R 777 storage bootstrap/cache
migrate:
	docker-compose exec app php artisan migrate
migrate-fresh:
	docker-compose exec app php artisan migrate:fresh --seed

# commands:
#     docker-compose exec app composer install
#     docker-compose exec app composer update
#     ln -s public html
#     docker-compose run --rm node install
#     docker-compose run --rm node run server
