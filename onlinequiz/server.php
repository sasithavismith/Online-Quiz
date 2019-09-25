<?php 
session_start();

$db = mysqli_connect('localhost', 'root', '', 'quizdbase');
$username = "";
$email    = "";
$errors   = array(); 

if (isset($_POST['register_btn'])) {
  register();
}

function register(){
  
global $db, $errors, $username, $email;

$username    =  e($_POST['username']);
$email       =  e($_POST['email']);
$password_1  =  e($_POST['password_1']);
$password_2  =  e($_POST['password_2']);

if (empty($username)) 
{ 
  array_push($errors, "Username is required"); 
}

if (empty($email)) 
{ 
  array_push($errors, "Email is required"); 
}

if (empty($password_1)) 
{ 
  array_push($errors, "Password is required"); 
}

if ($password_1 != $password_2) {
  array_push($errors, "Passwords do not match");
}

 $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

if (count($errors) == 0) 
{
$password = md5($password_1);
    $query = "INSERT INTO users (username, email, password) 
           VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);

    $_SESSION['user'] = getUserById($logged_in_user_id);
    $_SESSION['success']  = "You are now logged in";
    header('location: index.php');        
    }
  }

function getUserById($id){
  global $db;
  $query = "SELECT * FROM users WHERE id=" . $id;
  $result = mysqli_query($db, $query);

  $user = mysqli_fetch_assoc($result);
  return $user;
}
function e($val){
global $db;
return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
global $errors;

if (count($errors) > 0){
  echo '<div class="error">';
  foreach ($errors as $error){
  echo $error .'<br>';
}
echo '</div>';
}
}

if (isset($_POST['login_btn'])) {
  login();
}

function login(){
global $db, $username, $errors;

$username = e($_POST['username']);
$password = e($_POST['password']);

if (empty($username)) {
  array_push($errors, "Username is required");
}
if (empty($password)) {
  array_push($errors, "Password is required");
}

if (count($errors) == 0) {
  $password = md5($password);

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');

header('location: index.php');
}else {
    array_push($errors, "Wrong username/password combination");
  }
}
}
?>



