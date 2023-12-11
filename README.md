<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

(image)

## Projeto CRUD Laravel + VueJs
[![en](https://img.shields.io/badge/lang-en-red.svg)](https://github.com/roddsdev/product-store-vue/blob/main/README.en.md)

Este é um pequeno projeto feito com:

- Laravel 10
- Inertia.js
- Vite.js
- PHP 8.1.2
- Vue.js 3.3.9
- Tailwind 3.3.6
- Sqlite (banco de dados em arquivo)


### Objetivo

- Aproveitar todas as regras de domínio e testes automatizados contidas em outro projeto, com front-end desenvolvido com o blade **[(Ver projeto aqui)](https://github.com/roddsdev/product-store-blade)**
- Demonstrar o uso dos relacionamento entre modelos (1-N e N-N) pelo "Eloquent"
- Demonstrar o CRUD de forma simplificada
- Utilizar a função "search" nativa dos modelos (entidades) localizados em app\Models
- Por boas práticas aprendidas com o SOLID, TDD, DDD e Clean Arquiteture em prática
- Demonstrar a utilização das database\Factories e database\Seeders
- Demonstrar a utilização das "Form Requests" para validar formulários antes de entrar nos métodos dos controllers
- Utilizar "Resource Routes" na definição de rotas (routes\web)

### Como usar

- Baixar projeto
- Acessar pasta via terminal 
- Usar o comando `composer install`
- Renomear o arquivo ".env.example" para ".env"
- Usar o comando `php artisan migrate`
- (opcional) usar o comando `php artisan db:seed` (se quiser gerar registros randômicos no banco de dados)
- Usar o comando `php artisan serve` (para subir o servidor)
- Abrir novo terminal na pasta raiz do projeto e usar o comando `npm run dev` (para subir o servidor do ambiente de desenvolvimento)
- Acessar o endereço `http://127.0.0.1:8000/`

### Testes automatizados (100% OK)

- Feitos no PHPUnit (nativo)
- Usar o comando `php artisan test`

### Usar no container Docker

- Acessar a pasta do projeto
- Usar o comando `docker compose up`
- Use o comando `docker compose exec main npm run dev` para subir o servidor do ambiente de desenvolvimento
- (opcional) Para acessar o container em linha de comando, use o comando `docker compose exec main sh`
- Acessar o endereço `http://127.0.0.1:8000/`

## Mais projetos em:

- **[Meu repositório](https://github.com/roddsdev?tab=repositories)**

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Screenshots
(image)

### Lista de produtos
(image)

### Paginação
(image)

### Detalhe do produto selecionado e seus relacionamentos
(image)

### Detalhe da categoria e os produtos a ela relacionados
(image)

### Validações de formulário
(image)
