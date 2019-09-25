<?php
  session_start();
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>
<?php
include('include/connection.php');
mysqli_select_db($conn, 'quiz');
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
<div class="container">

<h1 class="text-center text-success">Play Quiz!</h1>
<br><br><br>
<div class="row">
<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 m-auto d-block">
<div class="card">
    <h5 class="text-center card-header">You have to select only one out of 4. Best of Luck: </h5>
</div>
<br>
<form action="check.php" method="post">
<?php  
    $q = "SELECT * FROM questions ORDER BY rand() limit 5"; 
    $query = mysqli_query($conn,$q);
    while ($rows = mysqli_fetch_array($query)) {

    ?>

        <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>
    <div class="card">
        <h5 class="card-header"><?php echo $rows['questions'] ?></h5>
    
    <?php
    $q = "SELECT * FROM answers WHERE ans_id='{$rows['qid']}' order by rand()"; 
    $query1 = mysqli_query($conn, $q);
    while ($rows = mysqli_fetch_array($query1)) { 
        ?>
        <div class="card-body">
            <input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]" value="<?php echo $rows['aid']; ?>">
            <?php echo $rows['answer']; ?>
        </div>

    <?php  
} 
}
 ?>
 </div>

 <div>
 <input class="btn btn-success m-auto d-block" type="submit" name="submit" value="Submit" >
</div>

<a href="logout.php"  class="btn btn-primary float-right mt-3">LOGOUT</a>
 
 </form>
 
 <br>
 </div>
 </div>

 <br>
</div>
</body>
</html>