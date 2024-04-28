 <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
    <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Bookstore Application

This is a simple CRUD application built with Laravel for managing a bookstore.

## Features

- View a list of books
- Add a new book
- Edit existing books
- Delete books

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/Piumir3/Book-Store.git
    ```

2. Install dependencies:

    ```bash
    composer install
    npm install && npm run dev
    ```

3. Set up environment variables:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Run migrations:

    ```bash
    php artisan migrate
    ```

5. Seed the database with book categories:

    ```bash
    php artisan db:seed --class=BookCategorySeeder
    ```

6. Serve the application:

    ```bash
    php artisan serve
    ```

## Usage

- Visit the homepage to view a list of books.
- Use the navigation links to add, edit, or delete books.



