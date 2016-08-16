<?php 
include 'header.php';
ob_start();
?>
<form action="#" method="post">
<?php
foreach ($page_4_importance as $key => $value) {
	$take_index = explode(":::", $key);
	$the_index = trim($take_index[1]);
	//var_dump($the_index);
	echo $take_index[0]."<br>";
	 echo "<select id='{$key}' name='importance_$the_index'>";
	for ($i = 1; $i <= count($value); $i++) {
	echo "<option value='{$value[$i-1]}|{$i}'>{$i}</option>";
	}
	echo "</select><br>";
}
?>
<input type="submit" value="Next!">
</form>
<?php
$output = ob_get_clean();
echo $output;
include 'footer.php';
?>
