<?php


require_once __DIR__ . '/../vendor/autoload.php';


$travel = new \App\Travel();

$ktmToIndia = new App\Transportation\Flight('KTM', 'DEL', 'F16', 'A320','Counter 6', 'Counter 7', 'F17');
$ktmToIndCard = new \App\BoardingCards\Card($ktmToIndia);

$indToSng = new App\Transportation\Flight('DEL', 'SNG', 'F16','A320', 'Counter 6', 'Counter 7', 'F17');
$indToSngCard = new \App\BoardingCards\Card($indToSng);

$sngToFrance = new App\Transportation\Flight('SNG', 'FRN', 'F16','A320', 'Counter 6', 'Counter 7', 'F17');
$sngToFranceCard = new \App\BoardingCards\Card($sngToFrance);

$frToBR = new App\Transportation\Flight('FRN', 'BR', 'F16','A320', 'Counter 6', 'Counter 7', 'F17');
$frToBRCard = new \App\BoardingCards\Card($frToBR);

$brToGer = new App\Transportation\Flight('BR', 'GER', 'F16','A320', 'Counter 6', 'Counter 7', 'F17');
$brToGerCard = new \App\BoardingCards\Card($brToGer);

$gerToApr = new App\Transportation\Bus('GER', 'APR', 'B12');
$gerToAprCard = new \App\BoardingCards\Card($gerToApr);

$aprToCER = new App\Transportation\Train('APR', 'CER', 'SK44', 'F23');
$aprToCERCard = new \App\BoardingCards\Card($aprToCER);


$travel->addBoardingCard($sngToFranceCard);
$travel->addBoardingCard($ktmToIndCard);
$travel->addBoardingCard($brToGerCard);
$travel->addBoardingCard($frToBRCard);
$travel->addBoardingCard($indToSngCard);
$travel->addBoardingCard($aprToCERCard);
$travel->addBoardingCard($gerToAprCard);

$itinerary = new \App\Itinerary($travel);

echo nl2br($itinerary->generate());

