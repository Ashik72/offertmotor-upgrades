<?php 
session_start();
include 'inc'.DIRECTORY_SEPARATOR.'functions.php';
if (!empty($_SESSION['page'])) {
	$_page = $_SESSION['page'];
} else {
	$_page = 1;
}
	switch ($_page) {
		case 2:
			include 'templates'.DIRECTORY_SEPARATOR.'page_2.php';
			break;
		case 3:
			include 'templates'.DIRECTORY_SEPARATOR.'page_3.php';
			break;
		case 4:
			include 'templates'.DIRECTORY_SEPARATOR.'page_4.php';
			break;
		case 5:
			include 'templates'.DIRECTORY_SEPARATOR.'page_5.php';
			break;
		case 6:
			include 'templates'.DIRECTORY_SEPARATOR.'page_6.php';
			break;
		case 7:
			include 'tpdf.php';
			break;
		default:
			include 'templates'.DIRECTORY_SEPARATOR.'home.php';
			break;
	}
if (isset($_SESSION)) {
//session_unset(); 
// destroy the session 
//session_destroy(); 
}
?>
