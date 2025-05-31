# PHP Login and Registration System

This is a simple user authentication system built with **PHP** and **MySQL**, allowing users to register, log in, and access a protected dashboard.

## Features

- User registration with input validation
- Secure password hashing using `password_hash()`
- User login with session handling
- Protected dashboard visible only to logged-in users
- Logout functionality to end user sessions

## Files Overview

- `registration.php` – Handles new user registration
- `login.php` – Authenticates users and starts a session
- `index.php` – Protected dashboard page (accessible only when logged in)
- `logout.php` – Ends the user session and redirects to login
- `database.php` – Connects to the MySQL database

## Database Setup

1. Create a MySQL database named `login-register`.
2. Create a table `users` with the following SQL:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
Requirements
PHP 7.4+
MySQL
Web server (e.g., Apache)

## Author

Created by [Dickson Wachira](https://github.com/Wachira-Dickson)
