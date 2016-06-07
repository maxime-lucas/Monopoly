<?php

// Includes divers
include_once("../models/sessions.php");
include_once("../models/tUsers.php");
include_once("../models/tCards.php");
include_once("../models/tTrades.php");
include_once("../models/tCardsInTrades.php");

$id = $_POST['data'];
$response_array['status'] = 'success'; 
$response_array['message'] = 'Suppression avec succès !';   
 
if( !is_numeric($id) || !existsTrade($id)  ) {
	$response_array['status'] = 'error'; 
	$response_array['message'] = 'ID non numérique ou Echange non-existant';   	
} else {
	$cards = getCardsInTradesByTradeId($id);

	foreach( $cards as $card ) {
		setCardStatusTo($card->id, 1);
		deleteFromCardInTrades( $card->id, $id );
	}
	updateTradeStatusById($id, -1);
}

header('Content-type: application/json');
echo json_encode($response_array);
