# PDO MySQL + Omni Email Utility

This project is a small PHP sample that demonstrates how to:

- connect to a MySQL database using PDO
- check whether a database exists
- create a database if it does not exist
- send email through the Green Omni API

## Project Structure

- `test.php` – example script for checking and creating the database
- `core/database.php` – PDO database connection setup
- `core/config.php` – API configuration such as URL, token, and sender email
- `core/omni.php` – function to send emails through the Omni API
- `functions/checkDB.php` – checks whether a database exists
- `functions/createDB.php` – creates a database

## Requirements

- PHP
- MySQL / MariaDB
- WAMP, XAMPP, or another local PHP server
- cURL enabled in PHP

## Configuration

Update the connection details in `core/database.php`:

```php
$host = "localhost";
$port = "3306";
$dbname = "mailflow";
$user = "sapna";
$password = "admin@123S";
```

Update the Omni API credentials in `core/config.php`:

```php
define('OMNI_API_URL', 'https://green-omni-api.onespiderorbit.com/');
define('OMNI_API_TOKEN', '.............');
define('OMNI_FROM_EMAIL', 'no-reply@onespiderorbit.com');
```

## Usage

### 1. Check database existence

The script uses the `checkDB()` function to verify whether a database exists:

```php
require_once("core/database.php");
include_once("functions/checkDB.php");

$db_name = "php_learning";

if (!checkDB($db_name)) {
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $db_name CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "Database created: $db_name";
}
```

### 2. Send email via Omni API

```php
require_once __DIR__ . '/core/omni.php';

$result = sendEmail(
    'recipient@example.com',
    'Your OTP is: 123456',
    '<h1>Account Update!</h1><p>Your OTP is <b>123456</b>.</p>'
);

print_r($result);
```

## Notes

- The database creation logic is a simple example for local learning and testing.
- `OMNI_API_TOKEN` should be kept private and never shared publicly.
- For production use, store sensitive values in environment variables instead of hardcoding them.

## Running the Project

Open the project in your local PHP server and run the example file:

```bash
http://localhost/pdo/test.php
```

If the database does not exist, the script will attempt to create it automatically.

## License

This project is for learning and demonstration purposes.
