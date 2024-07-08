# Form validation and data filtering

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

### Receiving the datas
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

### Executing your script when receiving the datas
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


## Checking the datas

### Access the datas

First, remember to set **a name for each inputs**.
```html
<form action="" method="POST">
    <input type="text" name="title" />
</form>
```

```php
$title = $_POST["title"];
```

Then, in order to retrieve the datas, you must **save them inside variables** or **access global variables**.

- Retrieving data with global variables:
```php
$name = $_POST["name"]; // The form method was of type POST

$name = $_GET["name"]; // The form method was of type GET
```
It is also possible to interact with `$_REQUEST`.

