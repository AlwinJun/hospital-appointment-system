<?php 
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'hospital_appointment_db';

$conn = new mysqli($host,$user,$password,$dbname);

if($conn->connect_error){
  die('Connection Faile: ' . $conn->connect_error);
}
?>