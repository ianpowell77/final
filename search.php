<?php

	include('inc/db-con.php');

	try{

		$search = "%";
		$search .= $_GET['search-text'];
		$search .= "%";
		$sql = 'SELECT `title`, `artist`, `image`, `description`, `price`, `product_id` FROM `products` WHERE `artist` LIKE :search1 OR `title` LIKE :search2 OR `description` LIKE :search3 OR `genre` LIKE :search4';

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':search1', $search, PDO::PARAM_STR);
		$stmt->bindParam(':search2', $search, PDO::PARAM_STR);
		$stmt->bindParam(':search3', $search, PDO::PARAM_STR);
		$stmt->bindParam(':search4', $search, PDO::PARAM_STR);
		$stmt->execute();

		$products = '';

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

?>
<!DOCTYPE html>
<html>
<head>
	<title>Search | Powell Music</title>
	<link rel="stylesheet" type="text/css" href="lib/styles/normalize.css">
	<link rel="stylesheet" type="text/css" href="lib/styles/main.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>
<body>
	<?php include('inc/header.php'); ?>

	<main class="content">
		<h1>Search Results...</h1>

		<?php 

			if(empty($products)){
				echo "<h2>Sorry, there were no results for that search.</h2>";
			} else {
				echo $products;
			}

		?>

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