# Training on PHP
I've got many things to learn about PHP. I'll save some tips there.

The basic way to **define a function** is the following :
```php
function multiply_numbers($num1, $num2){
  return $num1 * $num2;
}
```

## About the variables
All PHP variables must have a `$` as the first letter. It can be followed by an `_` character. <br> 
You must use **snake_case** when defining functions and variables names.

### Check the type

How to check the types of our variables while defining a function ? **Single parameter and return type**. 
```php
function multiply(int $num1, int $num2) : int {
  return $num1 * $num2;
}
```
That's better ! You can ask for integers as parameters that way and you can also add precisions about the return type.

You can also allow **multiple parameter and return types**:
```php
function multiply(int|float $a, int|float $b): int|float
{
  return $a * $b;
}
```

There are also many built-in functions which allow to quickly check a type, such as ```is_numeric($your_variable)```

**Casting**: <br>
There is, as in C#, a quick way to cast a type for a variable.
```php
  return (int) $a * (int) $b;
```