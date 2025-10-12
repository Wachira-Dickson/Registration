# Registration & Login System in PHP & MySQL

A simple user authentication system built using PHP and MySQL, allowing users to register, log in, and access a protected dashboard.

---

## Table of Contents

1. [Features](#features)  
2. [Technologies](#technologies)  
3. [Prerequisites](#prerequisites)  
4. [Setup & Installation](#setup--installation)  
5. [Usage](#usage)  
6. [Project Structure](#project-structure) 

---

## Features

- **User registration** with input validation  
- **Password hashing** using `password_hash()` for secure storage  
- **User login** with session handling  
- **Protected dashboard** page accessible only when authenticated  
- **Logout** functionality  
- Basic CSS styling  

---

## Technologies

- PHP (7.4+ recommended)  
- MySQL / MariaDB  
- Apache (or any web server supporting PHP)  
- HTML / CSS  

---

## Prerequisites

- A server stack (e.g. XAMPP, LAMP, WAMP) with PHP & MySQL  
- Basic knowledge of PHP & MySQL  
- A database client or tool (e.g. phpMyAdmin, MySQL Workbench)  

---

## Setup & Installation

1. **Clone the repository**  
   ```bash
   git clone https://github.com/Wachira-Dickson/Registration.git
   cd Registration
on Wachira](https://github.com/Wachira-Dickson)

2. Set up the database

Create a database, e.g. login_register

Run the following SQL to create the users table:

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

3. Configure database connection

Open database.php

Update host, username, password, and database name to match your environment

4. Usage

-> Register a new account

-> Login using email & password

-> On successful login, you will see the dashboard (index.php)

-> Logout to end the session and return to login

5. Registration/
├── database.php         # DB connection  
├── registration.php     # Registration form + logic  
├── login.php            # Login form + logic  
├── index.php            # Protected dashboard  
├── logout.php           # Logout & session destruction  
├── style.css            # Stylesheet  
└── index.php.save        # Backup / old version  

6.Author

Dickson Wachira
GitHub: Wachira-Dickson

---

If you like, I can also help you **improve or refactor parts of your code** (e.g. apply prepared statements, add reset password) and commit the changes. Would you like me to help with that next?

