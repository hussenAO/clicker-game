
<?php
require 'config.php';
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('username or email has already taken'); </script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn,$query);
            echo
            "<script> alert('registration succes'); </script>";

        }
        else{
            echo
            "<script> alert('password does not match'); </script>";

        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="../css/styleee.css" rel="stylesheet" type="text/css"/> <!-- links the CSS -->
    <title>Document</title>
</head>
<body>
<header class="nav">
        <ul>
        </ul>
    </header>
    <div class="login-form-container">
          <form class="" action="" method="post" autocomplete="off">
         <h3>registration</h3>
         <div class="box">
           
                <label for="name">Name :</label>
                <input type="text" name="name" id="name" required value=""><br>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" required value=""><br>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" required value=""><br>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required value=""><br>
                <label for="confirmpassword">Confirm Password :</label>
                <input type="password" name="confirmpassword" id="confirmpassword" required value=""><br>
        </div>
                <button class="btn" type="submit" name="submit">registreer</button>
                <p><a href="login.php">inloggen</a></p>
              </form>
    </div>
</body>
</html>