PHP := php

help:
	@echo ""
	# @echo "make install          ; install the project"
	# @echo "make clean            ; clean project"
	@echo "make up-dev             ; run project in local machine"
	@echo "make up-prod            ; run project in production machine"
	@echo "make up            		 ; run project"
	@echo "make restart            ; run restart project"
	# @echo "make stop             ; stop project"
	# @echo "make build            ; build project"
	# @echo "make shell            ; build and start interactive shell in php containers"
	# @echo "make composer-install ; run composer-install inside containers"
	# @echo "make composer-update  ; run composer-update inside containers"
	# @echo "make asset            ; build and install javascript modules"
	# @echo "make node-sh          ; build and start interactive shell in node containers"
	# @echo "make build            ; run docker-compose build"
	@echo "make down               ; run docker-compose down"
	@echo ""

build:
	@docker-compose build
up:
	@docker-compose up -d
restart:
	@docker-compose restart
down:
	@docker-compose down
deploy:
	@docker-compose down
	@docker-compose build
	@docker-compose up -d
composer-install:
	@docker-compose run --rm composer install
composer-update:
	@docker-compose run --rm composer update
composer-update-no-reqs:
	@docker-compose run composer update --ignore-platform-reqs
setup-laravel:
	@docker-compose run --rm artisan key:generate
	@docker-compose run --rm artisan storage:link
	@docker-compose run php chmod -R 777 storage bootstrap/cache
migrate:
	@docker-compose run --rm artisan migrate
migrate-fresh:
	@docker-compose run --rm artisan migrate:fresh --seed
npm-install:
	@docker-compose run --rm npm install
node-start:
	@docker-compose run --rm npm run start
node-dev:
	@docker-compose run --rm npm run dev:server
node-server:
	@docker-compose run npm run prod:server
build-css:
	@docker-compose run npm run dev
create-project:
	@docker-compose run --rm composer create-project --prefer-dist laravel/laravel .

