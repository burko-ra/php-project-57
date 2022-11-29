install:
	composer install
	php artisan key:generate

lint:
	composer phpcs
	composer phpstan

lint-fix:
	phpcbf

test:
	composer exec --verbose phpunit tests

test-coverage:
	composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml