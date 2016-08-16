<?php 
include 'header.php';
ob_start();
//var_dump($_SESSION['page_2_choice']);
?>
<p>V&auml;lj funktioner som &auml;r viktiga f&ouml;r er - minst 1 men maximalt 6</p>
<form action="#" method="post">
    <select multiple="multiple" id="page_2_choice" name="page_2_choice[]">
    <?php foreach ($page_2_values as $key => $value) {  ?>
     <option value='<?php echo $value; ?>'><?php echo $key; ?></option>
    <?php } ?>
    </select>
<input type="submit" value="Nästa!">
</form>
<?php
$output = ob_get_clean();
echo $output;
include 'footer.php';
?>

