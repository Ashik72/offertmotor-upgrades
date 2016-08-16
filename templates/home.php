<?php 
include 'header.php';
ob_start();
?>
<form action="#" method="post">
F&ouml;retagsnamn: <input type="text" name="company_name"><br>
E-post: <input type="text" name="email"><br>
<input type="submit" value="Nästa!">
</form>
<?php
if (count($_SESSION) > 0) {
 session_unset(); 
 session_destroy(); 
}
$output = ob_get_clean();
echo $output;
include 'footer.php';
?>
