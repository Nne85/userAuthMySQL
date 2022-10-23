<?php


function db() {
    //set your configs here
    $host = "localhost";
    $user = "root";
    $db = "zuriphp";
    $password = "";
    $conn = mysqli_connect($host, $user, $password, $db);
    if($conn->connect_error){
        echo "<script> alert('Error connecting to the database') </script>";
    }else {
        echo "Connected successfully";
    }
   
   return $conn;
  
}

db();
/*
$host = "localhost";
$user = "root";
$password = "";
$db = "zuriphp";
// Create connection
$conn = mysqli_connect($host, $user, $password, $db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


//create database
$conn = db();
$sql = "CREATE DATABASE zuriphp";
if (mysqli_query($conn, $sql)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}

//create table

$sql = 'CREATE TABLE Students (
	id INT(6) AUTO_INCREMENT PRIMARY KEY,
	Full_names VARCHAR(120) NOT NULL,
	Country VARCHAR(32) NOT NULL,
    Password VVARCHAR(32) NOT NULL.
	email VARCHAR(60),
	gender VARCHAR(10),
	dob TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)';
$conn = db();
if($conn){
    if (mysqli_query($conn, $sql)) {
	echo "Table Students created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
  
}


$filename = './users.sql'; 
$handle = fopen($filename, "r"); //open the file in a read mode
$contents = fread($handle, filesize($filename));//read the files and size. This is optional so following procedure.
$sql = file_get_contents($filename);// reads all the file as a string. No integer
$conn = db();
    if($conn){
        if(mysqli_query($conn, $sql)){
        echo "Done";
    }else{
        echo "Error";
    }
}
    fclose($handle);
 mysqli_close($conn);

*/

?>