<?php

require_once "../config.php";

if(isset($_POST['submit'])){
    $full_names = $_POST['full_names'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];


}
//register users
function registerUser($full_names, $email, $gender, $password, $country){
    //create a connection variable using the db function in config.php
    $conn = db();
    $select = mysqli_query($conn, "SELECT * FROM Students WHERE email = '". $_POST['email']."'"); 
    if(mysqli_num_rows($select)) {
        exit('This username already exists'); }
        else{
    $query = $query = "INSERT INTO Students (`full_names`, `email`, `gender`, `country`, `password`) 
    VALUES ('$full_names','$email', '$gender','$country', '$password');";

        if(mysqli_query($conn, $query)){
            echo "User Successfully registered";
            session_start();
            header("Location: ../dashboard.php");
        }
   //check if user with this email already exist in the database
}
}

session_start();
//login users


function loginUser($email, $password){
    //create a connection variable using the db function in config.php
    $conn = db();
    if(isset($_POST['login'])) {
        $sql = mysqli_query($conn,
        "SELECT * FROM Students WHERE email='"
        . $_POST["email"] . "' AND
        password='" . $_POST["password"] . "'    ");
       
        $num = mysqli_num_rows($sql);
       
        if($num > 0) {
            $row = mysqli_fetch_array($sql);
            session_start();
            header("location: ../dashboard.php");
            exit();
        }
        else {session_unset();
     
            echo '<h3>Sorry Invalid Email and Password<br>
            Please Enter Correct Credentials</br></h3>';
            header("location: ../login.html");
        }}
    //echo "<h1 style='color: red'> LOG ME IN (IMPLEMENT ME) </h1>";
    
     //open connection to the database and check if username exist in the database
     
      //if it does, check if the password is the same with what is given
    //if true then set user session for the user and redirect to the dasbboard
} 

function resetPassword($email, $password){
    //create a connection variable using the db function in config.php
    $conn = db();
    echo "<h1 style='color: red'>RESET YOUR PASSWORD (IMPLEMENT ME)</h1>";
    


if(isset($_POST['reset'])){

    $result = mysqli_query($conn, "SELECT * FROM Students ORDER BY email");
    $row = mysqli_fetch_array($result);
    
       $sql = "UPDATE Students set password='$password' WHERE email='$email'";
       if($conn->query($sql)== TRUE){
        echo "Update Sucessfully"; 
        header("location: ../dashboard.php");
    }else {
        echo " Update unsucessful"; 
        header("location: ../resetpassword.html");
    }
}
	
}
        //open connection to the database and check if username exist in the database
    //if it does, replace the password with $password given

function getusers(){
    $conn = db();
    
    $sql = "SELECT * FROM Students";
    $result = mysqli_query($conn, $sql);
    echo"<html>
    <head></head>
    <body>
    <center><h1><u> ZURI PHP STUDENTS </u> </h1> 
    <table border='1' style='width: 700px; background-color: magenta; border-style: none'; >
    <tr style='height: 40px'><th>ID</th><th>Full Names</th> <th>Email</th> <th>Gender</th> <th>Country</th> <th>Action</th></tr>";
    if(mysqli_num_rows($result) > 0){
        while($data = mysqli_fetch_assoc($result)){
            //show data
            echo "<tr style='height: 30px'>".
                "<td style='width: 50px; background: blue'>" . $data['id'] . "</td>
                <td style='width: 150px'>" . $data['full_names'] .
                "</td> <td style='width: 150px'>" . $data['email'] .
                "</td> <td style='width: 150px'>" . $data['gender'] . 
                "</td> <td style='width: 150px'>" . $data['country'] . 
                "</td>
                <form action='action.php' method='post'>
                <input type='hidden' name='id'" .
                 "value=" . $data['id'] . ">".
                "<td style='width: 150px'> <button type='submit', name='delete'> DELETE </button>".
                "</tr>";
        }
        echo "</table></table></center></body></html>";
    }
    //return users from the database
    //loop through the users and display them on a table
}

 function deleteaccount($id){
     $conn = db();
     $sql = "DELETE from Students where id=1";
if($conn){
    if (mysqli_query($conn, $sql)) {
	echo "Student successfully Deleted";
    session_unset();
    
    } else {
        echo "Error deleting table: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
     //delete user with the given id from the database
 }
