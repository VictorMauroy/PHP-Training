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