.PHONY: build

SHELL := /bin/bash

bash-migrate:
	@docker-compose exec app php artisan migrate:fresh
