<?php

declare(strict_types=1);

require_once __DIR__ . "/vendor/autoload.php";

use TestingComposer\Packages\Clientbase;

echo "This is a test page for the 0809 directory.";
$obj = new Clientbase;
echo "<br>" . $obj->getCountry();
$faker = Faker\Factory::create();
// why we are not using 'new' keyword to create a new instance of the Faker class? Because Faker uses a static factory method to create instances, which allows for more flexibility and customization when generating fake data.
// what is static factory method? A static factory method is a design pattern that provides a static method to create instances of a class, rather than using the 'new' keyword directly. This allows for more control over the instantiation process, such as returning different subclasses or applying specific configurations.
echo "<br>" . $faker->country();

$fakerCar = (new \Faker\Factory())::create();
// the above line is equivalent to $fakerCar = Faker\Factory::create(); but it uses a different syntax to call the static method. It first creates a new instance of the Faker\Factory class and then calls the static create() method on that instance. This is not a common practice and is generally less readable than directly calling the static method on the class itself.
$fakerCar->addProvider(new \Faker\Provider\FakeCar($faker));
// the above line adds a new provider to the Faker instance, which allows it to generate fake car-related data. The FakeCar provider is a custom provider that extends the functionality of Faker to include methods for generating car makes, models, and other related information.
echo "<br>" . $fakerCar->vehicle();
