# TinyGames - Laravel back-end

Manage your game collection!

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/10.x/installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker).

Clone the repository

    git clone https://github.com/pedrorckt/tinygames

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Seed your database with categories, platforms, games, users and collections

    php artisan db:seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000