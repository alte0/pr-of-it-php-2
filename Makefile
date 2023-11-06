.DEFAULT_GOAL := help
# Выводит описание целей - все, что написано после двойного диеза (##) через пробел
help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-16s\033[0m %s\n", $$1, $$2}'
####################################################################################################
# Управление контейнерами с помощью docker compose (dc)
####################################################################################################
dc-build: ## Сборка docker-образов согласно инструкциям из docker-compose.yml
	docker compose build
dc-up: ## Создание и запуск docker-контейнеров, описанных в docker-compose.yml
	docker compose up
dc-up-d: ## Создание и запуск docker-контейнеров, описанных в docker-compose.yml в detach mode
	docker compose up -d
dc-down: ## Остановка и УДАЛЕНИЕ docker-контейнеров, описанных в docker-compose.yml
	docker compose down
dc-stop: ## Остановка docker-контейнеров, описанных в docker-compose.yml
	docker compose stop
dc-start: ## Запуск docker-контейнеров, описанных в docker-compose.yml
	docker compose start