<?php
require_once __DIR__ . "/vendor/autoload.php";

// what autoload does is it will automatically load the class files when you create an object of that class. It will search for the class file in the vendor directory and include it in your script. This way you don't have to manually include the class files in your script.

use DilipParmar\project0709\Dummy;
// for each class we have to use the namespace and class name to create an object of that class. This is because the classes are in different namespaces and we have to specify the namespace to use the class.
// so we dont use lots of require_once statements to include the class files in our script. We can just use the namespace and class name to create an object of that class and the autoload will automatically load the class file for us.

// what are the benifits of using autoloading in PHP?
// 1. It reduces the number of require_once statements in your script.
// 2. It makes your code more organized and easier to maintain. 

echo 'Composer example';

$objc = new Dummy();
var_dump($objc);
echo $objc->getName();

// what if i have hundred of classes in my src folder. Do i need to use hundred of use statements to create objects of those classes? No, you can use the classmap autoloading feature of composer to automatically load all the classes in your src folder. You just need to specify the src folder in the composer.json file and composer will automatically generate a classmap for all the classes in that folder. This way you don't have to use hundreds of use statements to create objects of those classes.

// give me an example of classmap autoloading in composer. Sure, here is an example of classmap autoloading in composer:
// {
//     "autoload": {
//         "classmap": ["src/"]     
//     }        
// }