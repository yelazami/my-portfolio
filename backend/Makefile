COMPOSER ?= composer
DOCKER_COMPOSE = docker-compose
PROJECT = "Portfolio App."
PHP_CMD = php
PHP_SERVICE = backend
CMD := $(DOCKER_COMPOSE) exec $(PHP_SERVICE)
CONSOLE := php bin/console

composer-install:
	@echo "\n==> Running composer install, runner $(RUNNER)"
	$(CMD) $(COMPOSER) install

load-data:
	@echo "\n==> Running doctrine:migration:migrate ..."
	$(CMD) $(CONSOLE) d:m:m --no-interaction
	@echo "\n==> loading data with doctrine:fixture:load ..."
	$(CMD) $(CONSOLE) d:f:l --no-interaction

npm-dev:
	@echo "\n==> Running npm install, and npm run dev ..."
	$(CMD) npm install
	$(CMD) npm run dev

npm-prod:
	@echo "\n==> Running npm install, and npm run build ..."
	$(CMD) npm install
	$(CMD) npm run build

cc:
	@echo "\n==> Clearing cache"
	rm -rf backend/var/cache/*

clear: cc
	@echo "\n==> Cleaning project $(PROJECT) and starting up fresh"
	rm -rf backend/vendor/* backend/node_modules backend/public/build backend/var/logs/* backend/var/log/* backend/bin/php* backend/coverage/

lint: lint-json lint-yaml lint-php phpcs lint-composer lint-eol
	@echo All good.

lint-eol:
	@echo "\n==> Validating unix style line endings of files:"
	@! grep -lIUr --color '^M' app/ web/ src/ composer.* || ( echo '[ERROR] Above files have CRLF line endings' && exit 1 )
	@echo All files have valid line endings

lint-composer:
	@echo "\n==> Validating composer.json and composer.lock:"
	$(CMD) $(COMPOSER) validate --strict

lint-json:
	@echo "\n==> Validating all json files:"
	@find src -type f -name \*.json -o -name \*.schema | php -R 'echo "$$argn\t\t";json_decode(file_get_contents($$argn));if(json_last_error()!==0){echo "<-- invalid\n";exit(1);}else{echo "\n";}'

lint-yaml:
	@echo "\n==> Validating all yaml files:"
	@find app/config src -type f -name \*.yml | while read file; do echo -n "$$file"; $(CMD) php bin/console --no-debug --no-interaction --env=test lint:yaml "$$file" || exit 1; done

lint-php:
	@echo "\n==> Validating all php files:"
	$(CMD) find src -type f -iname '*php' -exec $(PHP_CMD) -l {} \;

phpcs:
	@echo "\n==> Checking php styles"
	$(CMD) vendor/bin/phpcs --standard=phpcs.xml -p

phpcbf:
	@echo "\n==> Fixing styling errors"
	$(CMD) vendor/bin/phpcbf

.PHONY: composer-install load-data npm-dev npm-prod cc clear lint lint-eol lint-composer lint-json lint-php lint-yaml phpcbf phpcs