# Expense tracker

Personal expense tracker built with vanilla PHP, MySQL and PDO.

## Features

- User registration and login
- Secure password hashing with `password_hash()` and `password_verify()`
- User-specific income and expense tracking
- Transaction categories
- Add, view and delete transactions
- CSRF protection
- AJAX transaction deletion without page reload
- PDO prepared statements for database queries

## Tech Stack

- PHP
- MySQL
- PDO
- JavaScript
- HTML
- CSS

## Database Schema

![Database Schema](database/database-schema.png)

The application uses a database with three main tables:

- `users`
- `categories`
- `transactions`

## Users

The `Users` table stores information about registered users.

Each user has their own account and can create and manage their personal transactions.

## Categories

The `Categories` table stores transaction categories, such as:

- Food
- Transport
- Entertainment
- Bills
  Categories are used to organize transactions and make expenses easier to track.

## Transactions

The `Transactions` table stores user's financial transactions.

Each transaction is linked to a user indirectly through the category it belongs to. A transaction contains information such as the amount, description, and date.

## Table Relationships

- One `User` can have many `transactions`.
- One `category` can be assigned to many `transactions`.
- Each `transaction` is indirectly associated with one `user` through its `category`.
- Each `transaction` belongs to one `category`.

This structure allows each user to track and categorize their expenses independently.

## Setup

1. Clone this repository
2. Create a MySQL database
3. Import `database/schema.sql` into your database
4. Copy the database configuration example:

```bash
cp config/database.example.php config/database.php
```

5. Open config/database.php and update the database credentials if needed
6. Start the PHP development server:

```bash
php -S localhost:8000 -t public
```

7. Open the application in your browser
