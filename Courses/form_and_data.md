# Form validation and data filtering

**Useful links**
- [PHP Form validation: step by step](https://mailtrap.io/blog/php-form-validation/)
- [Regex functions in PHP](https://www.php.net/manual/en/book.pcre.php)

## Validate a form

### Form creation in html (basics)
```html
<form method="post" action="">
  Username:
  <input type="text" name="username" value="<?php echo $username;?>">

  Password:
  <input type="text" name="password" value="">
  
  <input type="submit" value="Log in">
</form>
```
For now, you shouldn't care about the php part. You can either use a **POST** method or a **GET** method to send the data to your php script. <br />
Usually, peoples will **prefer using a POST method** because it had a lot more security for the data transfer. <br />
Click here if you want to Learn more about [HTML form](https://developer.mozilla.org/fr/docs/Web/HTML/Element/form).

`action` hasn't been set because there is already an input of type submit that will trigger a php script (on the page). Therefore, it could be set if the script is at another URL. I guess.  

### Receiving the data
Once your submitted your form, the php part of your script will be able to receive them.

**1) Having your php code at the same place as your html**

You can either add a `.php` extension instead of the `.html` to your file and add php scripts inside it:
>index.php
```php
<?php 
// I'm validating and treating my things there
?>

<form action="" method="POST">
    <?php /* All my inputs */ ?>
</form>
```

**2) Working with two different files**

>index.html
```html
<form action="action.php" method="POST">
    <!-- All your inputs -->
</form>
```

>action.php
```php
<?php 
// I'm validating and treating my things there
?>
```

I won't show how to use the GET method. <br>

### Executing your script when receiving the data
Once all is set, you should be able to receive your data inside your php script. You only need one more thing for it to work:
```php
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST") { }
?>
```
There must be other ways to do it. I'll update later. <br>
Adding that line will **grant your script the ability to execute the code** when the submit button has been pushed. 
<br>

Note that it is **only the case if the script is inside the same file as your html**. Otherwise, `action="action.php"` inside your form definition will trigger a script.


## Access and transfer the data

First, remember to set **a name for each inputs**.
```html
<form action="" method="POST">
    <input type="text" name="title" />
</form>
```

```php
$title = $_POST["title"];
```

Then, in order to retrieve the data, you must **save them inside variables** or **access global variables**.

- Retrieving data with global variables:
```php
$name = $_POST["name"]; // The form method was of type POST

$name = $_GET["name"]; // The form method was of type GET
```
It is also possible to interact with `$_REQUEST`.

Another usefull global variable is `$_SESSION` which is quite secure. Mostly used to transfer data from one page to another.
> index.php
```php
session_start(); // Required for $_SESSION to work.

$_SESSION["name"] = "client_name";
```
> action.php
```php
session_start();

$client_name = $_SESSION["name"];
```
Note that `$_POST` and `$_GET` are able to do something similar.

- Using **cookies**: <br>
You could also consider using **cookies**, which are an interesting options to retrieve informations some time later.

>**W3Schools.com** <br>
*A cookie is often used to identify a user. A cookie is a small file that the server embeds on the user's computer. Each time the same computer requests a page with a browser, it will send the cookie too. With PHP, you can both create and retrieve cookie values.* 

An example from W3Schools:
```php
<?php
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>

<html>
    <body>

    <?php
    if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
    }
    ?>

    </body>
</html>
```

## Sanitizing

Before doing anything with the inputs given by a user, you must **check if the data are valid**, that they **doesn't contains code injections** and others non-authorized content.

### Checking the data type
I won't lose time here, consider checking the following link: [Variables management functions](https://www.php.net/manual/fr/ref.var.php)

The functions to check a type are pretty straightforward:
- `is_numeric`, `is_int`, `is_string`, `is_array` etc. are the basics.
- `is_null`, `is_object`, `is_callable`, `is_iterable` could be interesting to use.
- `print_r($var)` shows informations about a variable. `var_dump` is slightly different.
- `settype` add a type to a variable. 
- `gettype` get the type of a variable
- `unset` destroy a variable.
- `strval` convert a variable to the string type.
- `intval` convert a variable to the int type.

### Basics functions

- **htmlspecialchars**
```php
$name = $_POST["name"];
$sanitized_name = htmlspecialchars($name);

echo "Your name is $sanitized_name";
```

>**eitca.org** <br> By passing `$name` through the `htmlspecialchars` function, any special characters are converted to their HTML entity equivalents. This ensures that even if the user enters a string containing HTML tags or code, it will be displayed as plain text rather than being executed by the browser.

- **filter_var**

As its name say, that function is used to filter a variable. **You must choose a** [**filter**](https://www.php.net/manual/en/filter.filters.php) to apply.

There are two types of filters that are usually used:
- **Validate filters**
```php
// Check if $email is a valid address
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
```
Return the data if they are valid, false otherwise.

- **Sanitize filters**
```php
// Remove all illegal characters from $email
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
```
Return the filtered data on success, false on failure.

- **Other useful functions**
    - `strlen` allows to check the length of a string
    - `trim` allows to remove the white space at the beginning and end of a string. 
    - `stripslashes` allows to remove back slashes. Double back slashes are converted to mono back slashes.
    - `isset` checks if a variable is defined and not null. 
    - `empty` checks if a variable doesn't exist or is equal to false or zero

Here is a quick example from the official documentation.
```php
<?php
$var = 0;
                   
// Évaluée à vrai car $var est vide
if (empty($var)) {
  echo '$var vaut soit 0, vide, ou pas définie du tout';
}
                   
// Évaluée à vrai car $var est définie
if (isset($var)) {
  echo '$var est définie même si elle est vide';
}
?>
```

### Regular expressions
You should consider checking the [Official php **Regex doc**](https://www.php.net/manual/en/book.pcre.php). You can also learn how to do regex with that link: [**Pattern and Flags**](https://javascript.info/regexp-introduction).

Let's talk about the most used:
- **preg_filter** and **preg_replace**

**Search for a pattern** inside a string or array **and replace by a given replacement string**. It returns a new string or array.

They both do something quite similar. The main difference is the result which is returned: if no matches are found, *filter* will returns an empty array or a string while *replace* will return the array/string without replacements.

```php
 $pattern = "/thi+s/"; //The word this with 0 or more 'i'
 $sentence = "Ths is not thiiiiiiiis!";
 $replacement = "This"

$new_sentence = preg_replace($pattern, $replacement, $sentence);
// => "This is not this!"
```

- **[preg_match](https://www.php.net/manual/en/function.preg-match.php)**

It allows you to find **whether or not a given string match a specific pattern**. <br> 
It will `return 1 if yes`, `0 otherwise` and false if the check failed.
```php
 $pattern = "/[aeiou]/i"; //Check for vowels
 $word = "string!";

if(preg_match($pattern, $word)) {
  print("Your word contains a vowel");
} 
else {
  print("Your word doens't contains any vowels");
}
```

- **[preg_split](https://www.php.net/manual/en/function.preg-split.php)**

**Split a string by a given regular expression**. 

Return an array containing the substrings of the subject that has been split.

```php
 $pattern = "/[\s,]+/"; //Find any number of whitespaces or commas characters
 $sentence = "This is not the end!";

$words = preg_split($pattern, $sentence);
```