<?php 

include 'header.php';
ob_start();

?>

<?php 

var_dump($_SESSION);

$today = $_SESSION['today_pay'];
$remaining = $_SESSION['months_remaining'];
$howmanyselected = count($_SESSION['page_2_choice']);
$talliedimportance = $_SESSION['tailed_importance'];
$budget = $_SESSION['budget'];

$value1 = $today * $remaining;
$value2 = $howmanyselected * 2500;

$total = $value1 + $value2 + $talliedimportance + 30000;

$total = 60000;
$today = 89;

array_push($divisors, $_SESSION['months_remaining']);
var_dump($divisors);

foreach ($divisors as $key => $value) {
	$result[$value] =  round($total / $value);
	}

var_dump($result);
////as first priority check $today
foreach ($result as $key => $value) {
	if ($value <= $today) {
		$final_close_result = $value;
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
			break;
		}
	}

}

//var_dump($final_close_result);
if (empty($final_close_result)) {

	$final_close_result = -1;
}

	
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




<div class="list-group">

  <a href="#" class="list-group-item">Company name: <?php echo $_SESSION['company_name']; ?></a>
  <a href="#" class="list-group-item">Email: <?php echo $_SESSION['email']; ?></a>

  <a href="#" class="list-group-item">Choosen values: <br>
<?php for ($p2 = 0; $p2 < count($page_2_choice_names);$p2++) { ?>
<?php 	echo $page_2_choice_names[$p2][0]." : ".$_SESSION['page_2_choice'][$p2]."<br>"; ?>

	<?php } ?>
</a>
  <a href="#" class="list-group-item">Today pay: <?php echo $_SESSION['today_pay']; ?></a>
    <a href="#" class="list-group-item">Remaining months: <?php echo $_SESSION['months_remaining']; ?></a>

        <a href="#" class="list-group-item">Grading of importance: <br>

		
        <?php foreach ($_SESSION['valuename_importance'] as $key => $value) {
        	echo $value."<br>";
        } ?>


        </a>
  <a href="#" class="list-group-item">Tailed Importance: <?php echo $_SESSION['tailed_importance']; ?></a>
  <a href="#" class="list-group-item">Budget: <?php echo $_SESSION['budget']; ?></a>


</div>


<?php 

//echo $final_close_result;

if ($final_close_result === -1) {
	?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong>

  Unfortunately we're not able to meet your requirements! Would you like to change some options?
	<br>

<form action="#" method="post">
        <div class="form-group">
  <input type="hidden" name="go_back" value="1">
          </div>
        <button type="submit" class="btn btn-default">Let's go back!</button>
      </form>

<form action="#" method="post">
        <div class="form-group">
  <input type="hidden" name="reset_all" value="1">
          </div>
        <button type="submit" class="btn btn-default">Reset All!</button>
      </form>

</div>


	<?php	

} else {

$_SESSION['final_close_result'] = $final_close_result;
$_SESSION['beat_budget_status'] = 0;
	?>

<form action="#" method="post">
        <div class="form-group">
  <input type="hidden" name="get_pdf" value="1">
          </div>
        <button type="submit" class="btn btn-default">Get PDF!</button>
      </form>

	<?php 
}
 ?>
        <?php 

        for ($valp4=0; $valp4 < count($_SESSION['valuename_importance']); $valp4++) { 
        	${"page_4_" . $valp4} =  $_SESSION['valuename_importance'][$valp4];
        }

         ?>


<?php
$output = ob_get_clean();
echo $output;
include 'footer.php';
 ?>
