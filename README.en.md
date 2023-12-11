<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

![image](https://github.com/roddsdev/product-store-vue/assets/148573340/289ba58f-8064-45df-8e66-05a6687a1369)


## Project CRUD Laravel + VueJs
[![pt-br](https://img.shields.io/badge/lang-pt--br-green.svg)](https://github.com/roddsdev/product-store-vue/blob/main/README.md)

This is a small project made with:

- Laravel 10
- Inertia.js
- Vite.js
- PHP 8.1.2
- Vue.js 3.3.9
- Tailwind 3.3.6
- Sqlite (database in filesystem)


### Objective

- Take advantage of all domain rules and automated tests contained in another project, with a front-end developed with blade **[(Show project here)](https://github.com/roddsdev/product-store-blade)**
- Demonstrate the use of relationships between models (1-N and N-N) by "Eloquent"
- Demonstrate CRUD in a simplified way
- Use native "search" function on the models (entities) located in app\Models
- Work on good practices learned from SOLID, TDD, DDD and Clean Architecture
- Demonstrate the use of database\Factories and database\Seeders
- Demonstrate the use of "Form Requests" to validate forms before entering controller methods
- Using "Resource Routes" to define routes (routes\web)

### How to use

- Download project
- Access project folder by terminal
- Use command `composer install` (to install PHP dependencies - "vendor" folder)
- Use command `npm install` (to install Javascript dependencies - "node_modules" folder)
- Rename ".env.example" file to ".env"
- Use command `php artisan migrate`
- (optional) Use command `php artisan db:seed` (generate ramdom records in the database)
- Use command `php artisan serve` (getting the server up and running)
- Open a new terminal in the project root folder and use the `npm run dev` command (to run development environment server)
- Go to page `http://127.0.0.1:8000/`

### Automated tests (100% OK)

- Made with PHPUnit (native)
- Use command `php artisan test`

### Use in the Docker container

- Access project folder
- Use command `docker compose up`
- Use the command `docker compose exec main sh` (to access command line of container)
- Use command `composer install`
- Use command `npm install`
- Rename ".env.example" file to ".env"
- Use command `php artisan migrate`
- (optional) Use command `php artisan db:seed` (generate ramdom records in the database)
- Use command `exit` (to leave docker container)
- Use the command `docker compose exec main npm run dev` to run development environment server
- Go to page `http://127.0.0.1:8000/`

## More projects:

- **[My repository](https://github.com/roddsdev?tab=repositories)**

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Screenshots

### Product list
![image](https://github.com/roddsdev/product-store-vue/assets/148573340/6204d48a-0450-4dab-b81b-ab821317524b)

### Pagination
![image](https://github.com/roddsdev/product-store-vue/assets/148573340/2de90bfc-a6b9-494d-a30b-f224152d4b15)

### Detail of selected product and its relations
![image](https://github.com/roddsdev/product-store-vue/assets/148573340/d28942cc-60cb-49cb-98cf-2c92bea1a3f3)

### Detail of selected category and its relations products
![image](https://github.com/roddsdev/product-store-vue/assets/148573340/c3443329-1928-4db7-852b-89953352f445)

### Form validations
![image](https://github.com/roddsdev/product-store-vue/assets/148573340/ad100f21-2f47-4d53-b7e9-ad2bc8cc2c99)