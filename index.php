<?php
	include('inc/db-con.php');

	try {
		$sql = "SELECT title, artist, image, product_id FROM `products` ORDER BY rand() LIMIT 8";

		$stmt = $db->query($sql);
    
  	while($row = $stmt->fetch()){
    	$featuredProducts .= "<a href=\"product-detail.php?id=";
      $featuredProducts .= $row["product_id"];
      $featuredProducts .= "\">";
      $featuredProducts .= "<img class=\"featured-image\" alt=\"";
      $featuredProducts .= $row["title"] . ' by ' . $row["artist"];
      $featuredProducts .= "\" src=\"";
      $featuredProducts .= $row["image"];
      $featuredProducts .= "\">";
      $featuredProducts .= "</a>";
  	}

	} catch (PDOException $e) {
		echo "Unsuccessful request to database";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home | Powell Music</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="lib/styles/normalize.css">
	<link rel="stylesheet" type="text/css" href="lib/styles/main.css">
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>
<body>
	<?php include('inc/header.php'); ?>

	<main class="content">
		<h1>Powell <span class="primary-span">Music</span></h1>

		<section class="autoplay-section">
			<div class="autoplay">
			    <img alt="Trapsoul by Bryson Tiller" src="lib/img/bryson-tiller_trapsoul.jpg">
			    <img alt="Mr Davis by Gucci Mane" src="lib/img/gucci-mane_mr-davis.jpg">
			    <img alt="Perception by NF" src="lib/img/nf_perception.jpg">
		  	</div>
	  	</section>

	  <h2>• Featured Items •</h2>
	  <?= $featuredProducts ?>
  </main>

  <?php include('inc/footer.php'); ?>

  <script
	src="https://code.jquery.com/jquery-3.2.1.min.js"
	integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	crossorigin="anonymous"></script>
  <script type="text/javascript" src="slick/slick.min.js"></script>
  <script type="text/javascript" src="lib/js/slider.js"></script>
  <script src="lib/js/searchBar.js" type="text/javascript"></script>
</body>
</html>