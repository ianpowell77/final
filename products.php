<?php
	include('inc/db-con.php');

	if(isset($_GET) && $_GET["go"] == "Go" && $_GET["category"] != "All Products"){

		try{
			$sql = "SELECT title, artist, image, description, price, product_id FROM `products` WHERE `genre` = ?;";

			$stmt = $db->prepare($sql);
			$stmt->bindParam(1, $_GET["category"], PDO::PARAM_STR);
			$stmt->execute();

			while($row = $stmt->fetch()){
	    	$products .= "<div class=\"product-container\"><a href=\"product-detail.php?id=";
	    	$products .= $row["product_id"];
	    	$products .= "\"><img class=\"product-image\" alt=\"";
	    	$products .= $row["title"] . ' by ' . $row["artist"];
	    	$products .= "\" src=\"";
	    	$products .= $row["image"];
	    	$products .= "\"></a>";
	    	$products .= "<p class=\"details\">";
	    	$products .= $row["artist"];
	    	$products .= "</p>";
	    	$products .= "<p class=\"details\">";
	    	$products .= $row["title"];
	    	$products .= "</p>";
	    	$products .= "<p class=\"details\">";
	    	$products .= $row["description"];
	    	$products .= "</p>";
	    	$products .= "<p class=\"details\">$";
	    	$products .= $row["price"];
	    	$products .= "</p>";
	    	$products .= "<button class=\"add-button\">Add To Cart</button>";
	    	$products .= "</div>";
	  	}
	  } catch (PDOException $e) {
	  	echo "failed to gather category resources";
	  }
	} else {
		try {
		$sql = "SELECT title, artist, image, description, price, product_id FROM `products` ORDER BY `genre`";

		$stmt = $db->query($sql);
    
  	while($row = $stmt->fetch()){
    	$products .= "<div class=\"product-container\"><a href=\"product-detail.php?id=";
    	$products .= $row["product_id"];
    	$products .= "\"><img class=\"product-image\" alt=\"";
    	$products .= $row["title"] . ' by ' . $row["artist"];
    	$products .= "\" src=\"";
    	$products .= $row["image"];
    	$products .= "\"></a>";
    	$products .= "<p class=\"details\">";
    	$products .= $row["artist"];
    	$products .= "</p>";
    	$products .= "<p class=\"details\">";
    	$products .= $row["title"];
    	$products .= "</p>";
    	$products .= "<p class=\"details\">";
    	$products .= $row["description"];
    	$products .= "</p>";
    	$products .= "<p class=\"details\">$";
    	$products .= $row["price"];
    	$products .= "</p>";
    	$products .= "<button class=\"add-button\">Add To Cart</button>";
    	$products .= "</div>";
  	}

	} catch (PDOException $e) {
		echo "Unsuccessful request to database";
	}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Products | Powell Music</title>
	<link rel="stylesheet" type="text/css" href="lib/styles/normalize.css">
	<link rel="stylesheet" type="text/css" href="lib/styles/main.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>
<body>
	<?php include('inc/header.php'); ?>

	<main class="content">

		<h1>Products</h1>

		<h2>• Filter By Genre •</h2>

		<div class="cat-search">
			<form class="cat-form" method="GET">
				<select id="category" name="category">
					<option>All Products</option>
					<option>Hip-Hop</option>
					<option>Country</option>
					<option>Rock/Metal</option>
					<option>RnB</option>
					<option>Pop</option>
					<option>Latin</option>
					<option>Folk</option>
				</select>
				<input type="submit" name="go" id="go" value="Go">
			</form>
		</div>

		<?= $products; ?>

	</main>

	<?php include('inc/footer.php'); ?>
	<script
	src="https://code.jquery.com/jquery-3.2.1.min.js"
	integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	crossorigin="anonymous"></script>
	<script src="lib/js/addToCart.js" type="text/javascript"></script>
	<script src="lib/js/searchBar.js" type="text/javascript"></script>
</body>
</html>