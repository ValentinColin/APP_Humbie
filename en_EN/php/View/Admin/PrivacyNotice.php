<?php
session_start();
include('../../Controller/function.php');
verif_access('ADMIN');
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
	<link rel="stylesheet" type="text/css" href="../../../../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/PrivacyNotice.css">

</head>

<body>
	<?php require('header.php'); ?>
	<?php require('nav.php') ?>
    <img src="../../../../Images/Remplissage_gauche.png" id="remplissage-gauche">

	<main>

		<div id='notice'>
			<h1 id="title"> Privacy policy </h1>

			<div id='notice_text'>

				<h2>Introduction</h2>

				<p>Within the framework of its commercial activity of manufacturer and editor of programs and test cards for airplane pilots, © Humbie Corp. is led to treat information concerning you. For example, by filling out a registration form, by contacting our Customer Service via the FAQ, by browsing our websites, by clicking on an advertising link that we present to you, you send us information, some of which is likely to identify you ("personal data").</p>
				<p>This Privacy Policy informs you about how we collect and process your personal data. We invite you to read it carefully.</p>


				<h2>Persons in charge of data processing</h2>

				<p>The six members of the executive committee of © Humbie Corp. are responsible for the confidentiality of their data and all have a dazzling sense of style</p>


				<h2>Type of data</h2>

				<p>The data collected are surname, first name, email address, foot size and preferred music. We collect them in order to generate a profile that is as complete and personalised as possible.</p>

				<p>Each of these data is stored in unencrypted form on our database on GitHub, where everyone can access them if they have the link: Security assured! No one will ever know that you have tested our equipment!</p>




				<h2>What is the purpose of your data</h2>

				<p>As a company operated by a group of people who oversee us and on a strictly not-for-profit basis, we do not sort out any benefits from the data collected during the processes described above.</p>

				<p>Indeed, the only data present on the site and database are our personal information or data completely invented in order to serve our tests and needs. They will therefore never be used by anyone for anything in any world in which you reincarnate.</p>







			</div>

		</div>





	</main>

	<span id="footer-position">
		<?php require('footer.php'); ?>
	</span>
</body>

<?php //$_SESSION['search']='';
?>

</html>