# Expense tracker

Personal expense tracker built with vanilla PHP.

## Database Schema

![Database Schema](database/database-schema.png)

The application uses a database with three main tables:

- `Users`
- `Categories`
- `Transactions`

## Users

The `Users` table stores information about registered users.

Each user have their own account and can create and manage their personal transactions.

## Categories

The `Categories` tables stores transaction categories, such as:

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
- One `category` can be assigned to many `transactions`
- Each `transaction` is indirectly associated with one `user` through its `category`.
- Each `transaction` belongs to one `category`

This structure allows each user to track and categorize their expenses independently.

## Setup

1. Clone this repository
2. Create a MySQL database
3. Import `database/schema.sql` into your database
