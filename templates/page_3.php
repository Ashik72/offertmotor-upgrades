<?php
include 'header.php';
ob_start();
?>
<form action="#" method="post">
Hur mycket betalar ni idag? <input type="text" name="today_pay"><br>
Hur m&aring;nga m&aring;nader har ni kvar p&aring; ert nuvarande avtal (0-36) ?
<select name="months_remaining">
<?php
for ($i = 1; $i <= HOW_MANY_MONTHS; $i++) {
?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php } ?>
</select>
<br>
<input type="submit" value="Nästa!">
</form>
<?
$output = ob_get_clean();
echo $output;
include 'footer.php';
?>
