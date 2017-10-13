<?php
	include('inc/db-con.php');

	if(isset($_POST) && $_POST["submit"] == "Submit"){

		try {

			$sql = "INSERT INTO `comments` (`f_name`, `l_name`, `email`, `comment`) VALUES(?,?,?,?);";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(1, $_POST["fname"], PDO::PARAM_STR);
			$stmt->bindParam(2, $_POST["lname"], PDO::PARAM_STR);
			$stmt->bindParam(3, $_POST["email"], PDO::PARAM_STR);
			$stmt->bindParam(4, $_POST["comment"], PDO::PARAM_STR);
			$stmt->execute();

		} catch (PDOException $e) {
			echo "Couldn't perform query";
		}

	}

	try {
		$sql = "SELECT `f_name`, `l_name`, `comment` FROM `comments` ORDER BY comment_id DESC";
		$stmt = $db->query($sql);

		while($row = $stmt->fetch()){
			$comments .= "<div class=\"comment-container\">";
			$comments .= "<p class=\"name\">";
			$comments .= htmlspecialchars($row["f_name"]);
			$comments .= " ";
			$comments .= htmlspecialchars($row["l_name"]);
			$comments .= "</p>";
			$comments .= "<p class=\"comment\">";
			$comments .= htmlspecialchars($row["comment"]);
			$comments .= "</p>";
			$comments .= "</div>";
		}
	} catch (PDOException $e) {
		echo "Couldn't gather information";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Comments | Powell Music</title>
	<link rel="stylesheet" type="text/css" href="lib/styles/normalize.css">
	<link rel="stylesheet" type="text/css" href="lib/styles/main.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>
<body>
	<?php include('inc/header.php');?>
	<main class="content">
		<h1>Comments</h1>
		<?= $comments; ?>
	</main>
	<?php include('inc/footer.php');?>

	<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
    <script src="lib/js/searchBar.js" type="text/javascript"></script>
</body>
</html>