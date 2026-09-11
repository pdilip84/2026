<?php

$x = (int)100;
$y = (string) 305;

var_dump($x + $y);

$z = (string) $x . $y;

var_dump($z);
// this gives "100305" because the dot operator concatenates the two strings together.

// what if i want to add the two values together as numbers instead of concatenating them as strings? I can cast $y back to an integer before adding:
$w = $x + (int)$y;
var_dump($w);

// when we manually convert the type of data from one type to another, we call that "type casting". In this case, we are casting the string $y back to an integer before adding it to $x. This allows us to perform the addition operation as intended, rather than concatenating the two values as strings.

// when system automatically converts the type of data from one type to another, we call that "type juggling". In this case, PHP automatically converts the string $y to an integer before adding it to $x. This allows us to perform the addition operation as intended, rather than concatenating the two values as strings.

// type juggling can be useful in some cases, but it can also lead to unexpected results if you're not careful. It's generally a good idea to be explicit about the types of data you're working with, and to use type casting when necessary to ensure that your code behaves as expected.

// type juggling can also be used to convert between different types of data in other ways. For example, you can use type juggling to convert a boolean value to an integer, or to convert an array to a string. However, it's important to be aware of the potential pitfalls of type juggling, and to use it judiciously in your code.

// type juggling is also known as "type coercion", and it can be a powerful tool in PHP when used correctly. However, it's important to understand how it works and to be aware of the potential pitfalls, so that you can use it effectively in your code.