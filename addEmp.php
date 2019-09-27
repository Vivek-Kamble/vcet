<?php
session_start();

$name = "";
$email = "";
$mobile = "";
$password="";
$address ="";
$errors=[];

    $db = mysqli_connect('localhost', 'root', '', 'digitaldashboard');
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
  $password= mysqli_real_escape_string($db, $_POST['password']);
  $address = mysqli_real_escape_string($db, $_POST['address']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "NAme is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($mobile)) { array_push($errors, "Mobile is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM emloyeedetails WHERE eUsername='$email' OR eEmail='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['eUsername'] === $email) {
      array_push($errors, "Username already exists");
    }

    if ($user['eEmail'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	
  	$query = "INSERT INTO emloyeedetails (eName,eUsername,ePassword, eEmail, ePhone,eAddress) 
  			  VALUES('$name', '$email', '$password','$email','$mobile','$address')";
  	mysqli_query($db, $query);
  	
  }
  
  

header('location: pl.php?#');
?>