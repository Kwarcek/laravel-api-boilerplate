<h1>Riotters - Zadanie rekrutacyjne</h1>

<b>Zadanie rekrutacyjne - wymagania</b>    
Celem zadania jest wykonanie aplikacji na podstawie framework Laravel (tylko backend; bez frontendu), która dostarczy RESTful API do otrzymywania informacji o aktualnej pogodznie i aktualnych warunkach pogodowych w danej okolicy przy wykorzystaniu platformy OpenWeatherApp. Aplikacja powinna implementować poniższe wymagania funkcjonalne i niefunkcjonalne.


## Stack
- [Laravel - PHP Framework](https://laravel.com/).
- [OpenSwoole - Async solution](https://openswoole.com/).
- [Docker - containerization](https://www.docker.com/).

## Installation
1. Clone repository (`git clone https://github.com/Kwarcek/riotters-zadanie-rekrutacyjne`)
2. Go to project directory (`cd riotters-zadanie-rekrutacyjne`)
3. Copy `.env.example` file to `.env` (`copy .env.example .env`)
4. Build docker (and allow file-sharing) (`docker compose up -d`)
5. Open container with bash (`docker exec dc-php bash`)
6. Install node package manager (`npm install`)
7. Install composer (`composer install`)
8. Generate Laravel app key (`php artisan key:generate`)
9. Restart services (`supervisorctl restart all`)
10. Deploy application (`php artisan app:deploy`)

## Testing
Once you've written tests, you may run them using phpunit `./vendor/bin/phpunit`

In addition to the phpunit command, you may use the test Artisan command to run your tests. The Artisan test runner provides verbose test reports in order to ease development and debugging: `php artisan test`
