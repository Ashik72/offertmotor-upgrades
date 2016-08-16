<?php 
include 'class-db.php';
if (!empty($_GET['reset']) && ($_GET['reset'] == 1)) {
session_unset(); 
// destroy the session 
session_destroy(); 
}
if (!empty($_POST['company_name']) && !empty($_POST['email'])) {
	$_SESSION['company_name'] = $_POST['company_name'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['page'] = 2;
}
if (!empty($_POST['page_2_choice'])) {
	if (count($_POST['page_2_choice']) > 6) {
			$_SESSION['page'] = 2;
			$error = "minst 1 val och max 6";
	} else {
		$_SESSION['page_2_choice'] = $_POST['page_2_choice'];
		$_SESSION['page'] = 3;
	}
}
if (!empty($_POST['months_remaining']) && !empty($_POST['today_pay'])) {
	$pay_today_amount = (int) $_POST['today_pay'];
	if (empty($pay_today_amount)) {
		$error = "Amount must be in numeric format!";
	} else {
	$_SESSION['today_pay'] = (int) $_POST['today_pay'];
	$_SESSION['months_remaining'] = (int) $_POST['months_remaining'];
	$_SESSION['page'] = 4;
	}
}
$count_page_4_importance = count($page_4_importance);
//var_dump($_POST);
	$valuename_importance = array();
	$valuename_importance_num =  array();
for ($count_var_p4 = 1; $count_var_p4 <= count($page_4_importance); $count_var_p4++) {
	if (!empty($_POST["importance_{$count_var_p4}"])) {
		array_push($valuename_importance, (int) $_POST["importance_{$count_var_p4}"]);
		//$_SESSION['page'] = 5;
		$divide_them = explode("|", $_POST["importance_{$count_var_p4}"]);
		array_push($valuename_importance_num, (int) trim($divide_them[1]));
		$set_importance_flag = 1;
	}
}
if (!empty($set_importance_flag)) {
	$_SESSION['valuename_importance'] = $valuename_importance;
	$_SESSION['valuename_importance_num'] = $valuename_importance_num;
	$tailed_importance = array_sum($valuename_importance);
	$_SESSION['tailed_importance'] = $tailed_importance;
	$_SESSION['page'] = 5;
}
if (!empty($_POST['budget'])) {
	$budget_check = (int) $_POST['budget'];
	if (empty($budget_check)) {
		$error = "Amount must be in numeric format!";
	} else {
	$_SESSION['budget'] = (int) $_POST['budget'];
	$_SESSION['page'] = 6;
	}
}
if (!empty($_POST['reset_all'])) {
	session_unset(); 
	session_destroy(); 
}
if (!empty($_POST['go_back'])) {
		unset($_SESSION['page']);
		$_SESSION['page'] = 2;
		unset($_SESSION['page_2_choice']);
		unset($_SESSION['today_pay']);
		unset($_SESSION['months_remaining']);
		unset($_SESSION['valuename_importance']);
		unset($_SESSION['tailed_importance']);
		unset($_SESSION['budget']);
		unset($_SESSION['final_close_result']);
		unset($_SESSION['beat_budget_status']);
}
function getClosest($search, $arr) {
   $closest = null;
   foreach ($arr as $item) {
      if ($closest === null || abs($search - $closest) > abs($item - $search)) {
         $closest = $item;
      }
   }
   return $closest;
}
function empty_except_p1() {
		unset($_SESSION['page']);
		$_SESSION['page'] = 2;
		unset($_SESSION['page_2_choice']);
		unset($_SESSION['today_pay']);
		unset($_SESSION['months_remaining']);
		unset($_SESSION['valuename_importance']);
		unset($_SESSION['tailed_importance']);
		unset($_SESSION['budget']);
		unset($_SESSION['final_close_result']);
		unset($_SESSION['beat_budget_status']);
}
function mail_records($to, $subject, $message) {
$headers = "From: " . strip_tags(FROM_REPLY_TO) . "\r\n";
$headers .= "Reply-To: ". strip_tags(FROM_REPLY_TO) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	return mail($to, $subject, $message, $headers);
}

if (!empty($_POST['get_pdf'])) {
	//var_dump($_SESSION);
	//var_dump(count($_SESSION));
	//var_dump($db->real_escape_string("'s Hertogenbosch"));
	$company_name = $db->real_escape_string($_SESSION['company_name']);
	$company_mail = $db->real_escape_string($_SESSION['email']);
	$page_2_choice = $db->real_escape_string(implode(" , ",  $_SESSION['page_2_choice']));
	$valuename_importance = $db->real_escape_string(implode(" , ",  $_SESSION['valuename_importance']));
	$today_pay = $db->real_escape_string($_SESSION['today_pay']);
	$months_remaining = $db->real_escape_string($_SESSION['months_remaining']);
	$tailed_importance = $db->real_escape_string($_SESSION['tailed_importance']);
	$budget = $db->real_escape_string($_SESSION['budget']);
	$final_close_result = $db->real_escape_string($_SESSION['final_close_result']);
	$set_char_mysql = $db->execute_sql("SET NAMES 'UTF8'"); 
	$execute_sql_insert = $db->execute_sql("INSERT INTO `company` (`id`, `company_name`, `email`, `page_2_choice`, `today_pay`, `months_remaining`, `valuename_importance`, `tailed_importance`, `budget`, `final_close_result`) VALUES (NULL, '{$company_name}', '{$company_mail}', '{$page_2_choice}', {$today_pay}, {$months_remaining}, '{$valuename_importance}', {$tailed_importance}, {$budget}, {$final_close_result}); ");
if ($execute_sql_insert) {
	$_SESSION['page'] = 7;
} else {
	session_unset(); 
	// destroy the session 
	session_destroy();
	$error = "Something went wrong!"; 
}

}

function update_db() {
	global $db;
	$company_name = $db->real_escape_string($_SESSION['company_name']);
	$company_mail = $db->real_escape_string($_SESSION['email']);
	$page_2_choice = $db->real_escape_string(implode(" , ",  $_SESSION['page_2_choice']));
	$valuename_importance = $db->real_escape_string(implode(" , ",  $_SESSION['valuename_importance']));
	$today_pay = $db->real_escape_string($_SESSION['today_pay']);
	$months_remaining = $db->real_escape_string($_SESSION['months_remaining']);
	$tailed_importance = $db->real_escape_string($_SESSION['tailed_importance']);
	$budget = $db->real_escape_string($_SESSION['budget']);
	$final_close_result = $db->real_escape_string($_SESSION['final_close_result']);
	$final_close_result_month = (int) $db->real_escape_string($_SESSION['final_close_result_month']);
	$set_char_mysql = $db->execute_sql("SET NAMES 'UTF8'"); 
	$execute_sql_insert = $db->execute_sql("INSERT INTO `company` (`id`, `company_name`, `email`, `page_2_choice`, `today_pay`, `months_remaining`, `valuename_importance`, `tailed_importance`, `budget`, `final_close_result`, `final_close_result_month`) VALUES (NULL, '{$company_name}', '{$company_mail}', '{$page_2_choice}', {$today_pay}, {$months_remaining}, '{$valuename_importance}', {$tailed_importance}, {$budget}, {$final_close_result}, {$final_close_result_month}); ");
}
?>
