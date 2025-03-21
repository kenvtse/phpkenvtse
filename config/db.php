<?php
// Load environment variables from .env file only if not already defined
if (!function_exists('loadEnv')) {
    function loadEnv($path) {
        if (!file_exists($path)) {
            throw new Exception(".env file not found");
        }
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);
            putenv("$name=$value");
            $_ENV[$name] = $value;
        }
    }
}

// Load .env file
loadEnv(__DIR__ . '/../.env');

$host = 'localhost';
$username = 'root';  // User utama MySQL
$password = '';      // Kosongkan jika belum diubah
$database = 'db_project';

$conn = new mysqli('localhost', 'root', '', 'db_project');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>