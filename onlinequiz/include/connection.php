<?php 
 
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'quiz';
$conn = mysqli_connect('localhost', 'root', '', 'quiz');

if(mysqli_connect_errno())
{
die('Database Connection Failed' . mysqli_connect_error());
}

?>