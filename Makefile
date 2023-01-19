-include backend/Makefile
DOCKER_COMPOSE = docker-compose
PROJECT = "Portfolio App"
COMPOSE_PROJECT_NAME ?= $(notdir $(shell pwd))


help:
	@ echo "Usage: make <target>\n"
	@ echo "Available targets:\n"
	@ cat Makefile backend/Makefile | grep -oE "^[^: ]+:" | grep -oE "[^:]+" | grep -Ev "help|default|.PHONY"

container-stop:
	@echo "\n==> Stopping docker container"
	$(DOCKER_COMPOSE) stop

container-down:
	@echo "\n==> Removing docker container"
	$(DOCKER_COMPOSE) down

container-downv:
	@echo "\n==> Removing docker container"
	$(DOCKER_COMPOSE) down -v

container-remove:
	@echo "\n==> Removing docker container(s)"
	$(DOCKER_COMPOSE) rm

container-up:
	@echo "\n==> Docker container building and starting ..."
	$(DOCKER_COMPOSE) up --build -d



tear-down: container-stop container-down container-remove

install-dev: tear-down clear container-up composer-install npm-dev load-data
	@echo "#########################################################"
	@echo "\n==> Your $(PROJECT) is successfully installed, enjoy 😁"
	@echo "\n#########################################################\n\n"
	$(DOCKER_COMPOSE) ps

install-prod: tear-down clear container-up composer-install npm-prod load-data
	@echo "\n==> Your $(PROJECT) is successfully installed, enjoy :\)"

.PHONY: help install container-down container-downv container-remove container-stop container-up