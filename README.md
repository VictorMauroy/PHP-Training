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
Note: By defining explicitly the first index as 1, the array will start at 1 and end at 4. Also note that you can define your key&value without caring about the order, but add a value without a paired key will result in adding it after the last one (in the current case, February was added at index 4).

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

**Useful functions**:

The functions to check a type are pretty straightforward:
- `is_numeric`, `is_int`, `is_string`, `is_array` etc. are the basics.
- `is_null`, `is_object`, `is_callable`, `is_iterable` could be interesting to use.
- `print_r($var)` shows informations about a variable. `var_dump` is slightly different.
- `settype` add a type to a variable. 
- `gettype` get the type of a variable
- `unset` destroy a variable.
- `strval` convert a variable to the string type.
- `intval` convert a variable to the int type.

## Les classes

### Attributes, methods and data access

#### How to define a class
```php
class Survivor {

  //Defining an attribute
  public $_name;
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

echo $jake->_name; // Accessing a property. If it's public

$jake->getPresentation(); // Calling a method.
```

Note that you won't access the properties or methods by using a dot `.` like others languages.

#### Getter and setter
```php
class Survivor {

  private $_name;
  private function getName(){ 
    return $this->_name; 
  }
  private function setName($new_name){ 
    return $this->_name = $new_name; 
  }

  public function __construct($name) 
  {
    $this->_name = $name;
    // or
    $this->setName($name);
  }
}
```

Note: Basic visibility has the same names: `private`, `protected` and `public`.

#### Inheritance (parents and childrens classes)
```php
class Character 
{
  protected $_name;

  public function __construct($name) 
  {
    $this->_name = $name;
  }

  public function sayPresentation() {
    echo "That character name is: $this->_name";
  }
}

class Player extends Character 
{
  private $_level;

  public function __construct($name, $level) 
  {
    parent::__construct($name); 
    $this->_level = $level;
  }

  // Defining again a presentation will override the one in the parent class when calling it with a Player object.
  public function sayPresentation() {
    echo "That player name is: $this->_name and its level is $this->_level";
  }
}
```

Note that when calling a parent method, you must use the `::` operator with the `parent` keyword. <br>
Don't forget to use `extends` to define an inheritance.

Here are some examples about how to use thoses classes:
```php
$character = new Character("MikaelaNPC"); 
$character->sayPresentation(); 
// output: That character name is: MikaelaNPC

$player = new Player("Jake", 10);
$player->sayPresentation();
// output: That character name is: Jake and its level is 10
```

#### Static methods