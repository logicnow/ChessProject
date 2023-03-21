.PHONY: test

test:
	docker-compose up -d
	docker exec -it jdk mvn test
	docker-compose down

