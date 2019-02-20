<?php


require_once __DIR__ . '/../vendor/autoload.php';


$cards = [];
$ktmToIndia = new App\Transportation\Flight('KTM', 'DEL', 'F16', 'A320','Counter 6', 'Counter 7', 'F17');
$ktmToIndCard = new \App\BoardingCards\Card($ktmToIndia);
array_push($cards, $ktmToIndCard);

$indToSng = new App\Transportation\Flight('DEL', 'SNG', 'F16','A320', 'Counter 6', 'Counter 7', 'F17');
$indToSngCard = new \App\BoardingCards\Card($indToSng);
array_push($cards, $indToSngCard);

$sngToFrance = new App\Transportation\Flight('SNG', 'FRN', 'F16','A320', 'Counter 6', 'Counter 7', 'F17');
$sngToFranceCard = new \App\BoardingCards\Card($sngToFrance);
array_push($cards, $sngToFranceCard);

$frToBR = new App\Transportation\Flight('FRN', 'BR', 'F16','A320', 'Counter 6', 'Counter 7', 'F17');
$frToBRCard = new \App\BoardingCards\Card($frToBR);
array_push($cards, $frToBRCard);

$brToGer = new App\Transportation\Flight('BR', 'GER', 'F16','A320', 'Counter 6', 'Counter 7', 'F17');
$brToGerCard = new \App\BoardingCards\Card($brToGer);
array_push($cards, $brToGerCard);

$gerToApr = new App\Transportation\Bus('GER', 'APR', 'B12');
$gerToAprCard = new \App\BoardingCards\Card($gerToApr);
array_push($cards, $gerToAprCard);

$aprToCER = new App\Transportation\Train('APR', 'CER', 'SK44', 'F23');
$aprToCERCard = new \App\BoardingCards\Card($aprToCER);
array_push($cards, $aprToCERCard);

$travel = \App\Travel::createFromBoardingCards($cards);

$itinerary = new \App\Itinerary($travel);

echo nl2br($itinerary->generate());

