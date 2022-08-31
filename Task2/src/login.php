<!DOCTYPE html>
<html   lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page </title>
    </head>
  
    <body>
        <div>
            <h1>LOGIN Page</h1>
            <form   action="login.php"  method="POST"> <!--form element takes username and password -->
            username: <input type="text" name="username">    
            password: <input type="password" name="password" placeholder="Enter username">
            <input type='Submit' name='submit' value='login'>
</form>
</div>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        $username=$_POST['username']; //variable $username holds the passed username
        $password=$_POST['password']; //variable $password holds the passed password
        if($username=='uon'&& $password=='1234'){   //checks if the username and pasword  matches
            echo '<script type="text/javascript">location.href="newRecipe.php";</script>';  //redirect to newRecipe.php
        }
        else
            echo 'Invalid login details';   // else displays this error
            } 
?>