<?php
	//create query to pull specific id of product
	include('inc/db-con.php');

	try {
		$sql = "SELECT title, artist, image, description, price, genre FROM `products` WHERE product_id = ?";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(1, $_GET["id"], PDO::PARAM_INT);
		$stmt->execute();
    
  	while($row = $stmt->fetch()){
        $genre = $row["genre"];
        $title = $row["title"];
    	$product .= "<div class=\"main-product-container\">";
    	$product .= "<img class=\"main-product\" alt=\"";
        $product .= $row["title"] . ' by ' . $row["artist"];
        $product .= "\" src=\"";
        $product .= $row["image"];
        $product .= "\">";
    	$product .= "<h2>Artist</h2>";
    	$product .= "<p class=\"main-details\">";
    	$product .= $row["artist"];
    	$product .= "</p>";
    	$product .= "<h2>Title</h2>";
    	$product .= "<p class=\"main-details\">";
    	$product .= $row["title"];
    	$product .= "</p>";
    	$product .= "<h2>Description</h2>";
    	$product .= "<p class=\"main-details\">";
    	$product .= $row["description"];
    	$product .= "</p>";
    	$product .= "<h2>Price</h2>";
    	$product .= "<p class=\"main-details\">$";
    	$product .= $row["price"];
    	$product .= "</p>";
        $product .= "<select class=\"quantity\">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>";
    	$product .= "<button class=\"add-button\">Add To Cart</button>";
    	$product .= "</div>";
  	}

	} catch (PDOException $e) {
		echo "Unsuccessful request to database";
	}

    try{

        $sql2 = "SELECT title, artist, image, product_id FROM `products` WHERE genre = ? AND title != ?";
        $stmt2 = $db->prepare($sql2);
        $stmt2->bindParam(1, $genre, PDO::PARAM_STR);
        $stmt2->bindParam(2, $title, PDO::PARAM_STR);
        $stmt2->execute();

        while($row2 = $stmt2->fetch()){
            $recommended .= "<a href=\"product-detail.php?id=";
            $recommended .= $row2["product_id"];
            $recommended .= "\">";
            $recommended .= "<img class=\"featured-image\" alt=\"";
            $recommended .= $row2["title"] . ' by ' . $row2["artist"];
            $recommended .= "\" src=\"";
            $recommended .= $row2["image"];
            $recommended .= "\">";
            $recommended .= "</a>";
        }

    } catch (PDOException $e) {
        echo "Unsuccessful request for recommended items";
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Details | Powell Music</title>
	<link rel="stylesheet" type="text/css" href="lib/styles/normalize.css">
	<link rel="stylesheet" type="text/css" href="lib/styles/main.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>
<body>
	<?php include('inc/header.php'); ?>
	<main class="content">

        <h1>Product Information</h1>

		<?= $product ?>

        

		<h2>Recommended Choices For You</h2>

        <?= $recommended ?>

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