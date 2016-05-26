<?php
include_once("models/sessions.php");
include_once("models/tConnected.php");
include_once("models/tCards.php");

updateConnected();

if(!isLogged())
{
	header('location: login.php');
	exit(0);
}

$user = getInfosUsersById($_SESSION['auth']->id);

$page_title = "Accueil du site";
$nbConnected = getNbConnected();
$nbCards = getNbCardsGeneral();

include_once("views/index.php");
                                                                                                                                                                                                                                                                                                                                     