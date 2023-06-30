# BEST PRACTICES
# * See https://tech.davis-hansson.com/p/make/
SHELL := bash
.ONESHELL:
.SHELLFLAGS := -eu -o pipefail -c
.DELETE_ON_ERROR:
MAKEFLAGS += --warn-undefined-variables
MAKEFLAGS += --no-builtin-rules

test:
	docker compose run phpunit
.PHONY: test

composer/version:
	docker compose run composer --version
.PHONY: composer/version

composer/require:
ifeq ($(PKG),)
	@echo -e "You need to specifiy a package in the variable PKG"
	@echo -e ""
	@echo -e "make composer/require PKG=psr/log"
else
	docker compose run composer require $(PKG)
endif
.PHONY: composer/require

composer/remove:
ifeq ($(PKG),)
	@echo -e "You need to specifiy a package in the variable PKG"
	@echo -e ""
	@echo -e "make composer/remove PKG=psr/log"
else
	docker compose run composer remove $(PKG)
endif
.PHONY: composer/remove
