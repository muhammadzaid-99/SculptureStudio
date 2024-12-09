## Web Engineering
Assignment 3 | BESE-13-B

## Group Members
1. Ahmed Bilal      417936
2. Muhammad Zaid    416952
3. Muhammad Zohaib  413441

## How to Run
See .env file for DB_PORT (3400 is being used).
Update it according to your XAMPP.

php artisan migrate
php artisan db:seed
php artisan storage:link
php artisan serve

## Admin Access
You can access admin at '/dashboard' route using credentials:
email: admin@example.com
password: 12345678