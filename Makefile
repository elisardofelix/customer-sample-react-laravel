local:
	(docker-compose up -d) \
	&& (docker-compose exec app rm -rf vendor composer.lock) \
	&& (docker-compose exec app composer install) \
	&& (docker-compose exec app php artisan key:generate) \
	&& (docker-compose exec app php artisan migrate)
test-back-end:
	(docker-compose down) \
	&& (docker-compose -f docker-compose.be.test.yml up -d) \
	&& (docker-compose exec test-app rm -rf vendor composer.lock) \
	&& (docker-compose exec test-app composer install) \
	&& (docker-compose exec test-app php artisan test) \
	&& (docker-compose -f docker-compose.be.test.yml down --rmi all)
test-front-end:
	(docker-compose down) \
	&& (docker-compose -f docker-compose.fe.test.yml run --rm frontend-test yarn run coverage) \
	&& (docker image rm cus-frontend-test-img)