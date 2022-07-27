## Инструкция по запуску 
```
1. cp .env.example .env
2. Установить пароль DB_PASSWORD для БД 
3. docker-compose up -d
4. docker-compose exec app php artisan migrate --seed
```
