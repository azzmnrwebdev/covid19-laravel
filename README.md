# RESTful API with Laravel Framework and Auth Sanctum

build RESTful API with [Laravel Framework](https://laravel.com/) and [Auth Sanctum](https://laravel.com/docs/10.x/sanctum)

## Description

This project is an implementation of a web service API based on a mini project assignment on campus. This service was built using Laravel Framework version 8 technology and applies the RESTful API concept and authentication using Sanctum.

## Main Feature

- Authentication feature
- CRUD features (create, read, update, delete)
- Positive patient data search feature
- Dead patient data search feature
- Data search feature for recovered patients
- Data search feature based on patient name keywords

## Tools Used

- Laravel Framework
- Laravel Sanctum

## Installation

Here are the steps to install and run this project:

1. Clone this repository with

    HTTPS:
    ```bash
    git clone https://github.com/azzmnrwebdev/covid19-laravel.git
    ```

    SSH:
    ```bash
    git clone git@github.com:azzmnrwebdev/covid19-expressjs.git
    ```

2. Run `composer install` to install all dependencies and packages.
3. Copy the `.env.example` file and paste the copied file. Rename the pasted file to `.env`.
4. Edit the required environment configuration in the `.env` file.

    Example:
    ```bash
    # Database Configuration
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=covid19-laravel
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5. Create a database that matches the database name in the environment configuration file.
6. Run this command `php artisan migrate` for the migration process.
7. Run `php artisan serve` and enjoy!!

## API Usage

1.  Register

    Request:
    ```http
    POST http://127.0.0.1:8000/api/register

    Body:

    {
        "name"     : "Administrator",
        "email"    : "admin@gmail.com",
        "password" : "admin123"
    }
    ```

2.  Login

    Request:
    ```http
    POST http://127.0.0.1:8000/api/login

    Body:

    {
        "email"    : "admin@gmail.com",
        "password" : "admin123"
    }
    ```

3.  Get All Patient

    Headers:
    | Key | Value | Description |
    |-----|-------|-------------|
    | Accept | application/json |  |
    | Authorization | Bearer `token_login` |  |

    Request:
    ```http
    GET http://127.0.0.1:8000/api/patients
    ```

4. Create Patient

    Headers:
    | Key | Value | Description |
    |-----|-------|-------------|
    | Accept | application/json |  |
    | Authorization | Bearer `token_login` |  |

    Request:
    ```http
    POST http://127.0.0.1:8000/api/patients

    Body:

    {
        "name" : "Fajar Kurniawan",
        "phone" : "0812345678953",
        "address" : "Jakarta Timur",
        "status" : "positive",
        "in_date_at" : "2023-04-10"
    }
    ```
    NB: Patient status can be filled with positive values, dead, and recovered. If the patient status is positive then the `out_date_at` key in the JSON data does not need to be filled in.

5. Detail Patient

    Headers:
    | Key | Value | Description |
    |-----|-------|-------------|
    | Accept | application/json |  |
    | Authorization | Bearer `token_login` |  |

    Request:
    ```http
    GET http://127.0.0.1:8000/api/patients/{id}
    ```

6. Update Patient

    Headers:
    | Key | Value | Description |
    |-----|-------|-------------|
    | Accept | application/json |  |
    | Authorization | Bearer `token_login` |  |

    Request:
    ```http
    PUT http://127.0.0.1:8000/api/patients/{id}

    Body:

    {
        "status" : "recovered",
        "out_date_at": "2023-06-25"
    }
    ```

7. Get Patient Positive

    Request:
    ```http
    GET http://127.0.0.1:8000/api/patients/status/positive
    ```

8. Get Patient Dead

    Request:
    ```http
    GET http://127.0.0.1:8000/api/patients/status/dead
    ```

10. Get Patient Recovered

    Request:
    ```http
    GET http://127.0.0.1:8000/api/patients/status/recovered
    ```

11. Get Patient By Name

    Request:
    ```http
    GET http://127.0.0.1:8000/api/patients/search/{name}
    ```

12. Delete Patient

    Headers:
    | Key | Value | Description |
    |-----|-------|-------------|
    | Accept | application/json |  |
    | Authorization | Bearer `token_login` |  |

    Request:
    ```http
    DELETE http://127.0.0.1:8000/api/patients/{id}
    ```

## Documentation Postman

[Documentation Postman](https://documenter.getpostman.com/view/29602079/2s9YBz3vbn#f23dd140-da26-4b5b-9461-e311543b253a)
