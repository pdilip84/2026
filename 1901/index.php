<?php 
declare(strict_types=1);
echo 'Hello, World! This is PHP version ' . PHP_VERSION . "\n";
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/vendor/autoload.php';

use DilipParmar\Project2026\App1901\models\UserModel;
use DilipParmar\Project2026\Core1901\Database;
use DilipParmar\Project2026\Core1901\Model;

$database = new Database($config['database']);
Model::setDatabase($database);

$user = new UserModel('John Doe', 'john@dummy.com');
echo 'User Name: ' . $user->getName() . "\n";
echo 'User Email: ' . $user->getEmail() . "\n";
echo 'Using Database: ' . $config['database']['name'] . "\n";
echo 'Table Name: ' . $user->getUsersTable() . "\n";
echo $user->getAllUsers() . "\n";
echo '<pre>';
print_r($user->getAllUsers());
echo '</pre>';
$database->close();