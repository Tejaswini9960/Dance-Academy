<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$First_name=$_POST['First_name'];
$Last_name=$_POST['Last_name'];
$gender=$_POST['gender'];
$contact_number=$_POST['contact_number'];
$email=$_POST['email'];
$dance_style=$_POST['dance_style'];

// Database connection
$conn = new mysqli('localhost','root','teju','dance');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into registration(First_name,Last_name,gender,contact_number,email,dance_style) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiss", $First_name, $Last_name, $gender, $contact_number, $email, $dance_style);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
?>