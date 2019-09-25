<?php 
session_start();
include('include/connection.php');
mysqli_select_db($conn, 'quizdbase');
?>	
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container text-center">
<br><br>
<h1 class="text-center text-success text-uppercase">Quiz</h1>
<br><br><br>
<table class="table text-center table-bordered table-hover">
<tr>
	<th colspan="2" class="bg-dark"><h1 class="text-white">Results</h1></th>
</tr>
<tr>
	<td>
		Questions Attempted:
	</td>
	
<?php 

$result = 0;
if (isset($_POST['submit'])) {
if (!empty($_POST['quizcheck'])) {
$count = count($_POST['quizcheck']);

?>
	<td>
		<?php 
			 echo "Out of 5,  You have selected.. " . $count . " options";
		 ?>
	</td>

		<?php 
			$selected = $_POST['quizcheck'];
			$q = "select * from questions";
			$query = mysqli_query($conn, $q);
			$i = 1;
			while($rows = mysqli_fetch_array($query)) {

			$checked = $rows['ans_id'] == $selected[$i];
			if ($checked) {
			$result++;
			}else{

				 }
			 		$i++;
					
				}
		?>
 </tr>
<tr>
	<td>
		Your Total score
	</td>
	<td colspan="2">
		<?php 
			echo "Your score is ".$result ;
			}
			else{
				echo "<b>Please! Select Atleast One Option.</b>";
				}
				 
				}
				?>
	</td>
</tr>
		<?php
	$name = $_SESSION['username'];
	$finalresult = "insert into user(username, totalques, answerscorrect) values('$name', '5', '$result')";
	$queryresult = mysqli_query($conn, $finalresult);

?>
	</table>
<a  href="logout.php" class="btn btn-primary">Logout</a>
	</div>
</body>
</html>