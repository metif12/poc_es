## Proof of concept for Laravel + Elasticsearch

uses : laravel scout + https://jeroen-g.github.io/Explorer/ as elastic driver

to start project first copy .env.example as .env and edit its configurations then
```bash
php artisan migrate
php artisan db:seed
php artisan serve
```
and got to /api/v1/posts?search endpoint,
see routes/api.php
