<?php 
include 'header.php';
ob_start();
?>
<form action="#" method="post">
Budget (v&auml;lj maxv&auml;rde):
<select name="budget">
<?php
foreach ($page_5_budget as $key => $value) {
?>
<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
<?php
}
?>
</select>
<!--- input type="text" name="budget" ---><br>
<input type="submit" value="Nästa!">
</form>

<?php
$output = ob_get_clean();
echo $output;
include 'footer.php';
?>
