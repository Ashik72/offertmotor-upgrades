<?php
//include 'header.php';
//ob_start();
?>
<?php
//var_dump($_SESSION);
$today = $_SESSION['today_pay'];
$remaining = $_SESSION['months_remaining'];
$howmanyselected = count($_SESSION['page_2_choice']);
$talliedimportance = $_SESSION['tailed_importance'];
$budget = $_SESSION['budget'];

$value1 = $today * $remaining;
$value2 = $howmanyselected * 2500;

$total = $value1 + $value2 + $talliedimportance + 30000;

//$total = 60000;
//$today = 89;

array_push($divisors, $_SESSION['months_remaining']);
//var_dump($divisors);

foreach ($divisors as $key => $value) {
	$result[$value] =  round($total / $value);
	}

////as first priority check $today
foreach ($result as $key => $value) {
	if ($value <= $today) {
		$final_close_result = $value;
		$final_close_result_month = $key;
		break;
	}
}
//var_dump($final_close_result);
//if still empty on $today, check $budget
if (empty($final_close_result)) {
	foreach ($divisors as $key => $value) {
	$result_budget[$value] =  round($budget / $value);
	}
	foreach ($result_budget as $key => $value) {
		if ($value <= $budget) {
			$final_close_result = $value;
			$final_close_result_month = $key;

			break;
		}
	}

}
//var_dump($final_close_result);
if (empty($final_close_result)) {
	$final_close_result = -1;
	$final_close_result_month = 0;
}
//var_dump($final_close_result);
//$the_closest[] = getClosest($budget , $result);
$the_closest[] = getClosest($today , $result);

//$the_closest_today = getClosest($today , $the_closest);
//$final_close_result = $the_closest_today;
foreach ($_SESSION['page_2_choice'] as $key => $value) {
	$page_2_choice_names[] = array_keys($page_2_values, $value);
};
//var_dump($page_2_choice_names[1]);
for ($p2 = 0; $p2 < count($page_2_choice_names);$p2++) {
	//echo $page_2_choice_names[$p2][0];
}
?>
<?php 
	for ($valp4=0; $valp4 < count($_SESSION['valuename_importance']); $valp4++) { 
		${"page_4_" . $valp4} =  $_SESSION['valuename_importance'][$valp4];
	}
//var_dump($_SESSION['valuename_importance']);
?>
<?php
//echo $final_close_result;
//$final_close_result = -1;
$to = MAIL_TO;
$subject = MAIL_SUBJECT;

$message_mail = '<html><body><div class="list-mail-group">';
$message_mail .= 'F&ouml;retagsnamn: '.$_SESSION["company_name"].'<br>';
$message_mail .=  'Epost: '.$_SESSION['email'].'<br>';

$message_mail .= "Valda funktioner: <br>";
for ($p2 = 0; $p2 < count($page_2_choice_names);$p2++) {
//$message_mail .= $page_2_choice_names[$p2][0]." : ".$_SESSION['page_2_choice'][$p2]."<br>";
$message_mail .= $_SESSION['page_2_choice'][$p2]."<br>";
	}
$message_mail .= 'Kund betalar idag: '. $_SESSION["today_pay"].'<br>';
$message_mail .= 'Avtal kvar: '. $_SESSION["months_remaining"].'<br>';
$message_mail .= 'Viktighetsv&auml;rden: <br>';
foreach ($_SESSION['valuename_importance'] as $key => $value) {
	$message_mail .= $value."<br>";
}
$message_mail .= 'Viktighet totalsumma: '. $_SESSION["tailed_importance"].'<br>';
$message_mail .= 'Budget: '. $_SESSION["budget"].'<br>';
$message_mail .= 'Offertpris: '. $final_close_result.'<br>';
$message_mail .= 'Antal m&aring;nader: '. $final_close_result_month.'<br>';
$message_mail .= "</body></html>";

$mail_stat = mail_records(MAIL_TO, MAIL_SUBJECT, $message_mail);

//var_dump($mail_stat);
//print_r($message_mail);
if ($final_close_result === -1) {
$_SESSION['final_close_result'] = $final_close_result;
$_SESSION['beat_budget_status'] = 1;
$_SESSION['final_close_result_month'] = $final_close_result_month;
update_db();
include ".".DIRECTORY_SEPARATOR."tpdf.php";
} else {
$_SESSION['final_close_result'] = $final_close_result;
$_SESSION['beat_budget_status'] = 0;
$_SESSION['final_close_result_month'] = $final_close_result_month;
update_db();
include ".".DIRECTORY_SEPARATOR."tpdf.php";
}
?>
<?php
//$output = ob_get_clean();
//echo $output;
//include 'footer.php';
?>
