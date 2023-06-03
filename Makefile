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
	PHP_CS_FIXER_IGNORE_ENV=true ./vendor/bin/php-cs-fixer fix --show-progress=estimating

.PHONY: validate-cs
validate-cs:
	PHP_CS_FIXER_IGNORE_ENV=true ./vendor/bin/php-cs-fixer fix --show-progress=estimating --dry-run

.PHONY: test
test: clear validate-cs
	XDEBUG_MODE=coverage ./vendor/bin/phpunit \
	  --testsuite all \
	  --coverage-html build/coverage \
	  --log-junit build/logs/phpunit/junit.xml

.PHONY: test-unit
test-unit:
	XDEBUG_MODE=coverage ./vendor/bin/phpunit --testsuite unit \
	  --coverage-html build/coverage

.PHONY: test-functional
test-functional:
	XDEBUG_MODE=coverage ./vendor/bin/phpunit --testsuite functional \
	  --coverage-html build/coverage

