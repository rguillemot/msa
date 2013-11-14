<?php
#if(!isset($_SESSION['code']) OR strlen($_SESSION['code']) !=5) exit("Erreur !");
#if($_SESSION['code'] != $_POST['verif']) exit("Erreur les valeurs sont différentes !");

if (isset($_POST['fname']))
	$name = $_POST['fname'];
if (isset($_POST['ffrom']))
	$from = stripslashes($_POST['ffrom']);
if (isset($_POST['fmsg']))
	$msg = stripslashes($_POST['fmsg']);
$envoi=mail("richard_guillemot@yahoo.fr", $name, $msg);
?>
<!DOCTYPE html>
﻿<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Contact us - msabusiness.de</title>
		﻿﻿<meta name="author" content="msabusiness.de" />
		<meta name="description" content="msabusiness.de" />
		<meta name="keywords" content="risk analysis consulting" />
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<!-- tags:1-->		<link rel="stylesheet" type="text/css" href="./css/main.css" media="all" />
<!-- tags:2-->		<link rel="stylesheet" type="text/css" href="./css/main.mobile.css" media="only screen and (max-width: 800px)" />
		<script type="text/javascript" src="js/jquery/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="js/jquery/jquery.validate.js"></script>	
<!-- tags:3-->		<script type="text/javascript" src="js/custom/jquery.customform.localization.en.js"></script>
<!-- tags:4-->		<script type="text/javascript" src="js/custom/jquery.customform.js"></script>
	</head>
	<body> 
	<div id="page">
		<!-- header -->
		<div id="header">﻿
			<div id="languages">
				<ul>
					<li>
<!-- tags:5-->						<a href="contacts-fr.html" class="linkheader" title="">
							<img src="./img/flag/fr-flag.png" alt="Browse msabusiness.de in French" />
						</a>
					</li>
					<li>
<!-- tags:6-->						<a href="contacts-us.html" class="linkheader" title="">
							<img src="./img/flag/de-flag.png" alt="Browse msabusiness.de in German" />
						</a>
					</li>

					<li>
<!-- tags:7-->						<a href="contacts-de" class="linkheader" title="">
							<img src="./img/flag/en-flag.png" alt="Browse msabusiness.de in English" />
						</a>
					</li>
				
				</ul>
			</div>
			<div id="logo">
<!-- tags:8-->				<a class="linklogo" href="home-fr.html" title="msabusiness.de - Home">
					<p id="logo">
						<span class="letter">m</span>odeling<br/>
						<span class="letter">s</span>imulation<br/>
						<span class="letter">a</span>nalyse<br/>
					</p>
				</a>
			</div>
			<div id="main-menu">
				<ul id="header_nav">
<!-- tags:9-->					<li><a href="home-fr.html" class="linkheader">Home</a></li>
<!-- tags:10-->					<li><a href="contacts-fr.html" class="linkheader">Contactez nous</a></li>
				</ul>
			</div>
		</div>
		<!-- /header -->
			<div id="content">
				<div class="subcontent">﻿
					<div id="contact" >
					<?php if($envoi) { ?>
<!-- tags:11-->					<h2><strong class="msastyle">msa</strong> vous remercie pour votre intérêt et vous contacte au plus vite.<br/>A très bientôt.</h2>
						<?php } else { ?>
<!-- tags:12-->					<h2>Malheureusement le mail n'a pas pu nous être acheminé.<br/>Vous pouvez nous contacter directement à l'adresse suivante:<br/><a href="mailto:contact@msabusiness.de">contact@msabusiness.de</a></h2>
						<?php } ?>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="footer">﻿
		<div id="footer-content">
			<div id="footer-container-full">
				<div id="footer-copyright">
<!-- tags:13-->					&copy; 2013 <a href="home-fr.html">msabusiness.de</a>  All rights reserved	
				</div>
			</div>		
		</div>
	</div>
	</body>
</html>


