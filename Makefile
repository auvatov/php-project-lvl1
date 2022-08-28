install:
	composer install

brain-games:
	php ./bin/brain-games

brain-even:
	php ./bin/brain-even

brain-calc:
	php ./bin/brain-calc

brain-bcd:
	php ./bin/brain-bcd

brain-progression:
	php ./bin/brain-progression

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

da:
	composer dump-autoload