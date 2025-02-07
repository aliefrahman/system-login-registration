# Secure Login & Registration System

A secure PHP-based authentication system with user roles and email verification.

## Features

- User registration with email verification
- Secure login system
- Role-based access control (User/Admin)
- CSRF protection
- Password hashing
- Input sanitization
- Responsive UI with Bootstrap 5
- Modern UI/UX design

## Technologies

- PHP 8.0+
- MySQL/MariaDB
- Bootstrap 5
- HTML5
- CSS3
- JavaScript
- Nginx/Apache

## Installation

1. Clone the repository:

```bash
git clone https://github.com/aliefrahman/system-login-registration.git
```

2. Configure your web server (Nginx/Apache)

3. Create database and import schema:

```sql
CREATE DATABASE login_system;
USE login_system;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    verification_code VARCHAR(255),
    is_verified BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

4. Update configuration:

```php
// config.php
define('DB_HOST', 'localhost');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
define('DB_NAME', 'login_system');
```

## Directory Structure

```
system-login-registration/
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── script.js
├── includes/
│   ├── config.php
│   └── functions.php
├── index.php
├── login.php
└──register.php
```

## Security Features

- Password hashing using PASSWORD_DEFAULT
- CSRF token protection
- Email verification
- Input sanitization
- Prepared statements for SQL
- Role-based access control
- Session security

## Usage

1. Access registration page:

register.php

2. Fill required information
3. Verify email through sent link
4. Login with credentials
5. Access features based on role

## Contributing

1. Fork the repository
2. Create feature branch
3. Commit changes
4. Push to branch
5. Create Pull Request

## License

MIT License

## Authors

- Aliefrahman <aliefrahman@gmail.com>

### 📱 Social/Contact

- Website: [https://qnetwork.biz.id/project/system-login-registration](https://qnetwork.biz.id/project/system-login-registration)
- GitHub: [@aliefrahman](https://github.com/aliefrahman)
- LinkedIn: [Aliefrahman](https://linkedin.com/in/aliefrahman)

```

```
