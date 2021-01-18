<?php
session_start();
include("../../Controller/function.php");


if_not_connected($redirection = "../../View/login.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Privacy policy</title>
	<link rel="stylesheet" type="text/css" href="../../../../css/config.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/home.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/PrivacyNotice.css">

</head>

<body>
	<?php require('header.php'); ?>

	<main>

		<div id="box-nav" class="my-block">
			<?php require('nav.php') ?>
		</div>

		<div id='notice'>
			<h1> Policy privacy </h1>

			<div id='notice_text'>

				<h2>Introduction</h2>

				<p>As part of its commercial activity as a manufacturer and publisher of aircraft pilot test cards and programs, Humbie Corp. is required to process information about you. For example, by filling out a registration form, by contacting our Customer Service via the FAQ, by browsing our websites, by clicking on an advertising link that we present to you, you provide us with information, some of which may identify you (“personal data”).</p>
				<p>This Privacy Policy informs you on how we collect and process your personal data. We invite you to read it carefully.</p>


				<h2>Responsible for data processing</h2>

				<p>The leaders are the six members of the Humbie Corp Executive Committee. They are responsible for the confidentiality of their data and all have a dazzling sense of style.</p>


				<h2>Type of data</h2>

				<p>The data collected are of the type name, first name, email address, foot size and favorite music. We collect them to generate the most complete and personalized profile possible.</p>

				<p>Each of these data is stored on our GitHub database, where everyone has access to it if they have the link: Guaranteed security! No one will ever know you took a test with our equipment!</p>




				<h2>What purposes for your data ?</h2>

				<p>As a company operated by a group of people who manage us and are strictly not for profit, we have absolutely no advantage over the data collected during the processes described above.</p>

				<p>Indeed, the only data present on the site and the database are our personal information or data completely invented in order to serve our tests and our needs. So they will never be used by anyone for anything in any world in which you will reincarnate.</p>







			</div>

		</div>





	</main>

	<?php require('footer.php'); ?>
</body>

<?php //$_SESSION['search']='';
?>

</html>