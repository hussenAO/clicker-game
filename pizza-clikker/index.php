<?php
require 'php/config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}   
 else{
    header("location: php/login.php");
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- sets width to device width, and initial zoom level -->
    <title>pizza clikker</title> <!-- title of page on tab -->
    <link href="css/styleee.css" rel="stylesheet" type="text/css"/> <!-- links the CSS -->
		<link rel="icon" type="image/png" sizes="32x32" href="Images/favicon.png"> <!-- favicon -->
		<link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' > <!--dit is de stylesheet voor de media links in het footer-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	</head>
  
	<body>
	<header class="nav">
        <ul>
            <li><a href="index.php">game</a></li>
            <li><a href="html/leaderboard.html">leaderboard</a></li>
			<li><a href="php/logout.php">logout</a></li>
        </ul>
    </header>
	
		<div class="wk">
		<h1>welcome <span><?php echo  $row["name"];?></span> naar onze clicker-game </h1>
  	 	</div>



		<center> <!-- makes all the content centered -->
			<img src="img/pizza.png" id="clickButton" onclick="increment()"> <!-- the image you have to click -->

			<div id="info"> <!-- contains the info (view below), in <span> tags because they constantly evolve -->
				<p id="appleCounter">Pizza = <span id="showApples" class="number">0</span></p> <!-- shows number of pizza's -->

				<p>pizza's per second = <span id="showApplesPerSecond" class="number">0</span></p> <!-- shows apples per second -->

				<p>pizza's per click = <span id="showApplesPerClick" class="number">1</span></p> <!-- shows apples per click -->

				<p id="gameOver"></p> <!-- for text to appear when you win -->
			</div>
			
			<!-- Items that can be bought -->
			<div class="itemContainer"> <!-- contains 4 items that you can buy -->
				<div class="item"> <!-- an item -->
					<div class="containerImage"> 
						<img src="img/download.jfif" id="iPhoneImage" class="itemImage" style="width:150px;height:170px;">

						<div class="buyButtonContainer"> <!-- contains button to buy item -->
							<button onclick="buyIPhone()" class="buyButton">Buy</button>
						</div>
					</div>

					<div class="containerText"> <!-- contains stats about item -->
						<p>Pizza Kraampje: <span id="iPhoneNum">0</span></p>

						<p>Pizza Kraampje cost: <span id="iPhoneCost">10</span></p>

						<p>+1 Pizza's per second</p>
					</div>
				</div>

				<div class="item"> <!-- an item -->
					<div class="containerImage"> <!-- contains image -->
						<img src="Img/78314345.jpg" id="iPadImage" class="itemImage" style="width:180px;height:180px;">

						<div class="buyButtonContainer"> <!-- contains button to buy item -->
							<button onclick="buyIPad()" class="buyButton">Buy</button>
						</div>
					</div>

					<div class="containerText"> <!-- contains stats about item -->
						<p>Deegroller:  <span id="iPadNum">0</span></p>

						<p>Deegroller cost: <span id="iPadCost">10</span></p>

						<p>+1 Pizza's per click</p>
					</div>
				</div>

				<div class="item"> <!-- an item -->
					<div class="containerImage"> <!-- contains image -->
						<img src="Img/69e6fba260ee443a31094382cebd5914--kitchen-gadgets-kitchen-stuff.jpg" id="penImage" class="itemImage" style="width:150px;height:180px">
				
						<div class="buyButtonContainer"> <!-- contains button to buy item -->
							<button onclick="buyPen()" class="buyButton">Buy</button>
						</div>
					</div>

					<div class="containerText"> <!-- contains stats about item -->
						<p>Tomatensaus Dispenser Pens:  <span id="penNum">0</span></p>

						<p>Tomatensaus Dispenser cost: <span id="penCost">200</span></p>

						<p>+100 Pizza's per second</p>
					</div>
				</div>
				
				<div class="item"> <!-- an item -->
					<div class="containerImage"> <!-- contains image -->
						<img src="Img/p_51_vbfih057_2019042617485299.jpg" class="itemImage" style="width:180px;height:180px">
					
						<div class="buyButtonContainer"> <!-- contains button to buy item -->
							<button onclick="buyAirPods()" class="buyButton">Buy</button>
						</div>
					</div>

					<div class="containerText"> <!-- contains stats about item -->
						<p>Kaasraster: <span id="airPodsNum">0</span></p>

						<p>Kaasraster cost: <span id="airPodsCost">500</span></p>

						<p>+100 Pizza's per click</p>
					</div>
				</div>
			</div>


			<div class="itemContainer"> <!-- contains 4 items that you can buy -->
				<div class="item"> <!-- an item -->
					<div class="containerImage"> <!-- contains image -->
						<img src="Img/beste-snijmachine--thegem-blog-timeline-large.jpg" class="itemImage" style="width:340px;height:180px">
						
						<div class="buyButtonContainer"> <!-- contains button to buy item -->
							<button onclick="buyMac()" class="buyButton">Buy</button>
						</div>
					</div>

					<div class="containerText">
						<p>Peperoni Snijmachine:  <span id="macNum">0</span></p>

						<p>Peperoni Snijmachine cost: <span id="macCost">10,000</span></p>

						<p>+1000 Pizza's per second</p>
					</div>
				</div>

				<div class="item"> <!-- an item -->
					<div class="containerImage"> <!-- contains image -->
						<img src="Img/OIP.jfif" id="iMacImage" class="itemImage" style="width:200px;height:180px">

						<div class="buyButtonContainer"> <!-- contains button to buy item -->
							<button onclick="buyIMac()" class="buyButton">Buy</button>
						</div>
					</div>

					<div class="containerText"> <!-- contains stats about item -->
						<p>Oven van Perfectie:  <span id="iMacNum">0</span></p>

						<p>Oven van Perfectie cost: <span id="iMacCost">1,000,000</span></p>

						<p>+10,000 Pizza's per click</p>
					</div>
				</div>

				<div class="item"> <!-- makes item go to right -->
					<div class="containerImage"> <!-- contains image -->
						<img src="Img/illustration-pizza-delivery-car-pixel-260nw-2093735824.webp" class="itemImage" style="width:290px;height:180px">
						
						<div class="buyButtonContainer"> <!-- contains button to buy item -->
							<button onclick="buyAppleStore()" class="buyButton">Buy</button>
						</div>
					</div>

					<div class="containerText"> <!-- contains stats about item -->
						<p>Luxe Pizza Bezorgwagen:  <span id="appleStoreNum">0</span></p>

						<p>Luxe Pizza Bezorgwagen cost: <span id="appleStoreCost">10,000,000</span></p>

						<p>+100,000 Pizza's per second</p>
					</div>
				</div>

				<div class="item"> <!-- an item -->
					<div class="containerImage">

						<div class="container">
							<img src="Img/pixel-pizza-top-view-detailed-isolated-vector-23128133.jpg" class="itemImage" style="width:300px;height:180px">
						
							<div class="buyButtonContainer"> <!-- contains button to buy item -->
								<button onclick="buySteveJobs()" class="buyButton">Buy</button>
							</div>
						</div>
					</div>

					<div class="containerText"> <!-- contains stats about item -->
						<p>Pizza Imperium:  <span id="steveJobsNum">0</span></p>

						<p>Pizza Imperium cost: <span id="steveJobsCost">1,000,000,000</span></p>

						<p>+1,000,000 Pizza's per click</p>
					</div>
				</div>
			</div>
		</center>
			 <!--hier begint de footer-->
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