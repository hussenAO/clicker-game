<?php
require 'config.php';
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)> 0);
        if($password == $row["password"]){
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                header("Location: ../index.php");
        }
        else{
            echo
            "<script> alert('password incorrect'); </script>";
        }
    }
   else{
        echo
        "<script> alert('user not registered'); </script>";
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styleee.css" rel="stylesheet" type="text/css"/> <!-- links the CSS -->
	<link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' > <!--dit is de stylesheet voor de media links in het footer-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>log-in</title>
</head>
<body>
<header class="nav">
        <ul>
        </ul>
    </header>
    	<div class="login-form-container">
		<form class="" action="" method="post" autocomplete="off">
				<h3>Log-in</h3>
				<div class="box">
        <label for="usernameemail">username of email :</label>
        <input type="text" name="usernameemail" id="usernameemail" required value=""><br>
        <label for="password">password :</label>
        <input type="password" name="password" id="password" required value=""><br>
	</div>
		    <button class="btn" type="submit" name="submit">log-in</button>
			<p><a href="registration.php">Nieuw account maken</a></p>
		</form>
	</div>
				 <footer>
				<div class="container">
					<div class="secoverons">
						<h2>Over ons</h2>
						<p>Duik in de heerlijke wereld van pizza's door in te loggen op jouw persoonlijke account. Onze clicker game biedt een smakelijke uitdaging, waarbij je jouw pizzabakkersvaardigheden kunt verbeteren en de meest epische pizza-imperiums kunt opbouwen.

						<br> <span class="lp">Let op:</span>  het spel is alleen toegankelijk voor ingelogde spelers. Meld je aan, klik erop los en zie hoe jouw pizzabusiness groeit!
						</p>
					</div>
					<div class="sm">
						<h2>social media</h2>
							<div class="social">
								<a href="#"><i class="bx bxl-facebook"></i></a>
								<a href="#"><i class="bx bxl-twitter"></i></a>
								<a href="#"><i class="bx bxl-instagram"></i></a>
								<a href="#"><i class="bx bxl-youtube"></i></a>
							</div>
					</div>
				</div>
			</footer>
	<script src="java/script-2.js"></script>
</body>
</html>


