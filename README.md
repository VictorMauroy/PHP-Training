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

### Arrays and Lists
In PHP, there are some differences with a few languages: <br>

#### The array definition

First way to define an array
```php
$months = array('January', "February", "March");
$months = ['January', "February", "March"];
```
Note: Index 0 will be equal to January, 1 will be equal to "February", etc.

The second is by **giving the index in the definition**:
```php
$months = array(1 => 'January', 3 => "March", "February");
$months = [1 => 'January', 3 => "March", "February"];
```
Note: By defining explicitly the first index as 1, the array will start at 1 and end at 3. Also note that you can define your key&value without caring about the order.

Arrays in PHP **can also use string as keys and values**. Int and string are the only types that you can use as a key.
```php
$months = array(
  "first" => 'January', 
  "second" => "February", 
  3 => "March" //That's also ok to use a different type
  );
```
I guess, they're a combination of arrays and dictionnaries. 
<br> More informations: [Arrays in PHP](https://www.php.net/manual/fr/language.types.array.php)

Something quite strange, you can access the elements of a returned array directly when you call a function:
```php
<?php
function getArray() {
    return array(1, 2, 3);
}

$secondElement = getArray()[1];
?>
```

**Adding elements to an array**:
```php
<?php
$arr = array(5 => 1, 12 => 2);

$arr[] = 56;    // Identique à $arr[13] = 56;
                // à cet endroit du script
```

To end the explanations, here is a more complex example:
```php
<?php
$array = array(
    "foo" => "bar",
    42    => 24,
    "multi" => array(
         "dimensional" => array(
             "array" => "foo"
         )
    )
);

var_dump($array["foo"]);
var_dump($array[42]);
var_dump($array["multi"]["dimensional"]["array"]);
?>
```

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


## Les classes

### Attributes, methods and data access

Here is a classic class definition:
```php
class Survivor {

  //Defining an attribute
  private $_name;
  private $_speed = 1.0; // with default value

  // Defining a constructor
  public function __construct($name, $speed) 
  {
    $this->_name = $name;
    $this->_speed = $speed;
  }

  // Defining a custom method
  public function getPresentation() 
  {
    echo "The survivor $this->_name can run at the speed of: " . $this->_speed;
  }
}
```

The following shows how you should define a new object and access its methods or properties:
```php
$jake = new Survivor("Jake", 1.2); // Create a new object

echo $jake->_name; // Accessing a property

$jake->getPresentation(); // Calling a method.
```

Note that you won't access the properties or methods by using a dot `.` like others languages.