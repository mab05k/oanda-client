.PHONY: dev
dev: .env
	docker-compose up -d

.env:
	cp .env.dist .env

.PHONY: down
down:
	docker-compose down

.PHONY: php
php:
	docker exec -it bos-oanda-client sh

.PHONY: build
build:
	composer install

.PHONY: clear
clear:
	rm -rf var/*

.PHONY: fix-cs
fix-cs:
	./vendor/bin/php-cs-fixer fix src/ --show-progress=estimating
	./vendor/bin/php-cs-fixer fix tests/ --show-progress=estimating

.PHONY: test
test: clear
	./vendor/bin/phpunit \
	  --coverage-html build/coverage

.PHONY: test-unit
test-unit:
	./vendor/bin/phpunit --testsuite unit \
	  --coverage-html build/coverage

.PHONY: test-functional
test-functional:
	./vendor/bin/phpunit --testsuite functional \
	  --coverage-html build/coverage

