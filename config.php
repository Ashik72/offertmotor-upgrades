<?php
define("DB_HOST", "localhost");
define("DB_NAME", "offert");
define("DB_USER", "root");
define("DB_PASSWORD", "klumpf0t");
define("MAIL_TO", "mikael@mrinfo.se");
define("MAIL_SUBJECT", "Offertkopia lixom -- Mattias");
define("FROM_REPLY_TO", "offert@geekteq.com");
$page_2_values = array(
					'A3' => "A3", 
					'Häftning' => "Häftning",
					'Hålslag' => "Hålslag",
					'Vikning' => "Vikning",
					'Papperssortering' => "Papperssortering",
					'Scanning' => "Scanning",
					'OCR-tolkning' => "OCR-tolkning",
					'Mobilanpassat' => "Mobilanpassat",
					'Mac-kompabilitet' => "Mac-kompabilitet",
					'Stor-magasin' => "Stor-magasin",
					);
define("HOW_MANY_MONTHS", 36);
$page_4_importance = array(
	"Driftsäkerhet ::: 1" => array( 2000, 3000, 4000, 5000, 6000),
	"Ekonomi ::: 2" => array(2000, 3000, 4000, 5000, 6000),
	"Hastighet ::: 3" => array( 2000, 3000, 4000, 5000, 6000),
	"Mobilitet ::: 4" => array( 2000, 3000, 4000, 5000, 6000)
	);
$page_5_budget = array(2000, 3000, 4000, 6000, 8000, 10000, 12000);
$divisors = array(12, 24, 36, 48, 60, 72);
?>
