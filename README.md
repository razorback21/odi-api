# Instructions

## Prerequisites

1. Run `composer install`
2. Run `npm install`
3. Rename `.env.example` to `.env`
4. Set APP_URL=http://localhost:8000
5. Generate APP_KEY - `php artisan key:generate`
6. Create a new SQLite database file inside the database folder name it `database.sqlite`
7. Run migration - `php artisan migrate`
8. Run the application - `php artisan serve` or `composer run dev`

## API Endpoints

I've used Postman to test the API endpoints. Or you can use any other API testing tool.

1. Generate api token end-point `/api/generate-token`
2. Then use the token in the header `Authorization: Bearer <token>`.

| Endpoint             | Method | Description            |
| -------------------- | ------ | ---------------------- |
| `/api/contacts`      | GET    | Get all contacts       |
| `/api/contacts/{id}` | GET    | Get a contact by ID    |
| `/api/contacts`      | POST   | Create a new contact   |
| `/api/contacts/{id}` | PUT    | Update a contact by ID |
| `/api/contacts/{id}` | DELETE | Delete a contact by ID |

Examples:

POST /api/contacts

```json
// body
{
    "name": "John Doe",
    "email": "john@example.com"
}
```

PUT /api/contacts/1

```json
// body
{
    "name": "Updated Name",
    "email": "updated@example.com"
}
```

DELETE /api/contacts/1

GET /api/contacts/1

```json
// JSON response
{
    "name": "John Doe",
    "email": "john@example.com"
}
```

GET /api/contacts

```json
// JSON response
[
    {
        "name": "John Doe",
        "email": "john@example.com"
    },
    {
        "name": "John Doe 2",
        "email": "john2@example.com"
    }
]
```

## Part 3 - SQL Queries

1. Find file named readme_p3.txt in the root folder of the project.

## Part 3.1 - Database Transaction

1. Run `php artisan app:test-db-transaction` // for success case
2. Run `php artisan app:test-db-transaction --failin=2` // for failed case
