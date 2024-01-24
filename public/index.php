<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

# db connection 

// $host = 'db_server';
// $user = 'root';
// $password = 'password123';
// $database = 'demo_db';
// // $host = getenv('DB_HOST');
// // $port = getenv('DB_PORT');
// // $user = getenv('DB_USERNAME');
// // $password = getenv('DB_PASSWORD');
// // $database = getenv('DB_DATABASE');
// // echo "Host: $host\n";
// // echo "Port: $port\n";
// // echo "User: $user\n";
// // echo "Password: $password\n";
// // echo "Database: $database\n";
// $connection = new mysqli($host, $user, $password, $database);
// if ($connection->connect_error) {
//     die("Connection failed: " . $connection->connect_error);
// }

// // Check if the MySQL server version is accessible
// $server_info = $connection->server_info;
// echo "MySQL server version: {$server_info}<br>";

// // // Perform additional checks or queries as needed

// // // Close the connection when done
// $connection->close();
/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
