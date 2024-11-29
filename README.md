<h1>Laravel API Boilerplate</h1>


## Stack
- [Laravel - PHP Framework](https://laravel.com/).
- [OpenSwoole - Async solution](https://openswoole.com/).
- [FrankenPHP - Async server](https://frankenphp.dev/).
- [Laravel Horizon - Redis queue manager](https://laravel.com/docs/11.x/horizon).

## Installation
1. Clone repository (`git clone https://github.com/Kwarcek/laravel-api-boilerplate`)
2. Go to project directory (`cd laravel-api-boilerplate`)
3. Copy `.env.example` file to `.env` (`copy .env.example .env`)
4. Build docker (and allow file-sharing) (`docker compose up -d`)
5. Open container with bash (`docker exec dc-php bash`)
6. Install node package manager (`npm install`)
7. Install composer (`composer install`)
8. Generate Laravel app key (`php artisan key:generate`)
9. Restart services (`supervisorctl restart all`)
10. Deploy application (`php artisan app:deploy`)

## Additional informations
1. The application will be available at URL http://localhost:8093/
2. Docker-compose.yml is build for local environment

## Testing
Once you've written tests, you may run them using phpunit `./vendor/bin/phpunit`

In addition to the phpunit command, you may use the test Artisan command to run your tests. The Artisan test runner provides verbose test reports in order to ease development and debugging: `php artisan test`
