<?php 
//header
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" media="screen" href="./assets/css/multi-select.css"> 
<link rel="stylesheet" media="screen" href="./assets/css/style.css"> 
<title>Offertmotor!</title>
</head>
<body>
	<div class="container-fluid">
	  <div class="row">
	   <div class="span12 text-center top-margin">
		<img src='img_pdf/header.png' height='75' width='246' /><br /><br />
<?php 
if (isset($error)) {
?>
<p class="bg-danger"><?php echo $error; ?></p>
<?php
}
?>
