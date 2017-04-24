<html>

<head>
<!DOCTYPE HTML>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="../styles/eric-meyer-reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<script src="../scripts/jquery-3.1.1.min.js"></script>
<script src="../scripts/prefixfree.js"></script>
<script src="../scripts/Slides-SlidesJS-3/source/jquery.slides.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Faster+One" rel="stylesheet">

<title>Kontinuum</title>

<script>
(function ($, window, document, undefined)
{
'use strict';$(function ()
{
$("#mobileMenu").hide();
$(".toggleMobile").click(function()
{
$(this).toggleClass("active");
$("#mobileMenu").slideToggle(500);});});
$(window).on("resize", function()
{
if($(this).width() > 500)
{
$("#mobileMenu").hide();
$(".toggleMobile").removeClass("active");
}});})(jQuery, window, document);
</script>

<script>
$(function() {
$('#slides').slidesjs({
height: 235,
navigation: false,
pagination: false,
effect: {
fade: {
speed: 400}},callback:
{
start: function(number)
{
$("#slider_content1,#slider_content2,#slider_content3").fadeOut(500);},
complete: function(number)
{
$("#slider_content" + number).delay(100).fadeIn(500);}},
play:
{
active: false,
auto: true,
interval: 6000,
pauseOnHover: false,
effect: "fade"}});});

</script>
</head>

<body>
<header>
<h1><img src='Kontinuum.png' alt='kontinuum'></h1>
<p>Untervermietung</p>
<div class="toggleMobile">
<span class="menu1"></span>
<span class="menu2"></span>
<span class="menu3"></span></div>
<div id="mobileMenu">
<ul>

<a href="."><li>Home</li></a>

<?php
session_start();
if(isset($_SESSION['login'])){
echo "<a href='index.php?click=account'><li>Account</li></a>";
echo "<a href='index.php?click=logout'><li>Logout</li></a>";
}else{
echo "<a href='index.php?click=login'><li>Login</li></a>";
echo "<a href='index.php?click=register'><li>Registrieren</li></a>";
}
?>


</ul></div>
<nav>
<ul>
<a href="."><li>Home</li></a>
<?php

if(isset($_SESSION['login'])){
echo "<a href='index.php?click=account'><li>Account</li></a>";
echo "<a href='index.php?click=logout'><li>Logout</li></a>";
}else{
echo "<a href='index.php?click=login'><li>Login</li></a>";
echo "<a href='index.php?click=register'><li>Registrieren</li></a>";
}
?>
</ul></nav></header>

<?php

if(	isset($_GET['click'])){}
else{
	echo'
<section class="container">
<h2 class="hidden">Slider</h2>
<div id=slideBG></div><article id=slider_content>
<h3>Jetzt Angebote oder Gesuche finden!</h3><br>
<form name="find" action="index.php?click=find" method="post">
<select name=ort id=ort><option>Stuttgart-Mitte</option>
	<option>Stuttgart-Nord</option>
	<option>Stuttgart-Ost</option>
	<option>Stuttgart-Süd</option>
	<option>Stuttgart-West</option>
	<option>Bad Cannstatt</option>
		<option>Birkach</option>
		<option>Botnang</option>
		<option>Degerloch</option>
		<option>Feuerbach</option>
		<option>Hedelfingen</option>
		<option>Möhringen</option>
		<option>Mühlhausen</option>
		<option>Münster</option>
		<option>Obertürkheim</option>
		<option>Plieningen</option>
		<option>Sillenbuch</option>
		<option>Stammheim</option>
		<option>Untertürkheim</option>
		<option>Vaihingen</option>
		<option>Wagen</option>
		<option>Weilimdorf</option>
		<option>Zuffenhausen</option></select>
<select name=aog id=aog><option>Angebote</option><option>Gesuche</option></select>
<div id=subm><input type=submit id=find value=Finden></div>
</form>
</article>
<div id="slides" style="display:block;">
<img src="WE1.png" alt="Picture 1">
<img src="WE2.png" alt="Picture 2">
<img src="WE3.png" alt="Picture 3"></div></section>';
}?>

<div class="content">
  <?php     
  
  if(isset($_GET['click'])){
    
   switch($_GET['click']){
     case 'login': include('login.html');break;  
	 case 'newpw': include('newpw.html');break;
	 case 'register': include('register.html');break; 
	case 'logout': include('logout.html');break; 
    case 'account':include('account.html');break;
	case 'offer':include('offer.html');break;
	case 'request':include('request.html');break;
	case 'find':include('find.html');break;
	case 'mail':include('mail.html');break;
	case 'object':include('object.html');break;
	case 'treffer':include('treffer.html');break;
	 case 'impressum':include('impressum.html');break;
	 case 'ch_pwd':include('ch_pwd.html');break;
	 case 'delete':include('delete.html');break;
	 case 'myOffers':include('myOffers.html');break;
	 case 'myRequests':include('myRequests.html');break;
	 case 'deleteOffer':include('deleteOffer.html');break;
	 case 'deleteRequest':include('deleteRequest.html');break;
	case 'requestinfo':include('requestinfo.html');break;
	case 'changeRequest':include('changeRequest.html');break;
	case 'changeOffer':include('changeOffer.html');break;
	case 'myOfferHits':include('myOfferHits.html');break;
	case 'myRequestHits':include('myRequestHits.html');break;
	case 'contact':include('contact.html');break;
     default: include('inhalt.html');
   }  
   
  
  }      
  else{
	  echo"<style>.content{min-height:300;}</style>";
  include('inhalt.html');    
    
  }
  
  
  
  
  ?>

</div>
<footer>
<h2 class="hidden">Our footer</h2>
<section id="copyright">
<h3 class="hidden">Copyright notice</h3>
<div class="wrapper">

&copy; Copyright 2017 by Kontinuum. All Rights Reserved.</div></section>
<section class="wrapper">
<h3 class="hidden">Footer content</h3>
<article class="column">
<h4>Entwickler</h4>
Tessa Haschtschek<br>Severin Neuner<br>Kevin Mangold<br>Florian Schmidt<br>Nicholas Dickel
</article>
<article class="column midlist">
<h4>Informationen</h4>
<a href='index.php?click=contact'>Zum Kontaktformular</a><br><a href='index.php?click=impressum'>Zum Impressum</a>
</article>
<article class="column rightlist">
<h4>Haftung</h4>
Diese Website basiert auf einem Projekt mit dem Ziel der Weiterbildung. Aus diesem Grund übernehmen wir keine Haftung für den Gebrauch der Seite.
</article></section></footer>


	</body></html>
