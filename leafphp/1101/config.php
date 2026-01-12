<?php
app()->attachView(Leaf\Blade::class);
app()->blade()->configure([
  'views' => 'views',
  'cache' => 'storage/cache'
]);
db()->connect([
  'host' => '127.0.0.1',
  'username' => 'root',
  'password' => 'Kavya&Prithvi@2022',
  'dbname' => 'mvc_db',
]);