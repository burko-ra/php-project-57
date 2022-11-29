install:
	composer install

lint:
	composer phpcs
	composer phpstan

lint-fix:
	phpcbf

test:
	composer exec --verbose phpunit tests

test-coverage:
	composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml