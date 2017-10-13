<!DOCTYPE html>
<html>
<head>
	<title>Contact | Powell Music</title>
	<link rel="stylesheet" type="text/css" href="lib/styles/normalize.css">
	<link rel="stylesheet" type="text/css" href="lib/styles/main.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>
<body>
	<?php include('inc/header.php'); ?>

	<main class="content">

		<h1>Leave a comment!</h1>

		<form action="comments.php" method="post" id="comment-form">

			<div class="contact-container">

				<div>
					<label for="fname">First Name</label>
					<input type="text" name="fname" id="fname">
				</div>

				<div>
					<label for="lname">Last Name</label>
					<input type="text" name="lname" id="lname">
				</div>

				<div>
					<label for="email">Email</label>
					<input type="text" name="email" id="email">
				</div>

				<div>
					<label for="comment">Comment</label>
					<textarea name="comment" id="comment"></textarea>
				</div>

				<div>
					<input type="submit" name="submit" id="submit" value="Submit">
				</div>

			</div>

		</form>

	</main>

	<?php include('inc/footer.php'); ?>

  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="lib/js/form.js"></script>
  <script src="lib/js/searchBar.js" type="text/javascript"></script>
</body>
</html>