# Laravel Mongo REST API

A RESTful API built with Laravel and MongoDB, providing CRUD operations for Employee resources. This project uses the official `mongodb/laravel-mongodb` package for seamless Eloquent integration with MongoDB.

## Description

This API allows you to manage employees (create, read, update, delete) with data stored in a MongoDB database. It is designed for easy local development and quick integration with modern front-end frameworks or API clients.

## Installation

1. **Clone the repository:**
   ```sh
   git clone <your-repo-url>
   cd laravel-mongo-rest-api
   ```
2. **Install dependencies:**
   ```sh
   composer install
   ```
3. **Copy the example environment file and set your variables:**
   ```sh
   cp .env.example .env
   # Edit .env to set MongoDB credentials
   ```
4. **Generate the application key:**
   ```sh
   php artisan key:generate
   ```
5. **Ensure MongoDB is running and accessible with the credentials in your `.env` file.**

## Running the Application

Start the Laravel development server:

```sh
php artisan serve
```

The API will be available at [http://localhost:8000/api/employees](http://localhost:8000/api/employees).

## API Endpoints

- `GET /api/employees` — List all employees
- `POST /api/employees` — Create a new employee
- `GET /api/employees/{id}` — Get a single employee
- `PUT /api/employees/{id}` — Update an employee
- `DELETE /api/employees/{id}` — Delete an employee

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
