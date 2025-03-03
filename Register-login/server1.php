<?php

 session_start();
 
 // initializing variables
$username = "";
$email    = "";
$password_1 = "";
$password_2 = "";
$errors = []; 

 // connect to database
 // Database connection settings
 $host = "82.165.6.246";
 $dbname = "pg_lilianrundu24";
 $user = "lilianrundupg";
 $password = "pgSt52GbPostGres24";
 
 // Establish a connection to PostgreSQL
 $conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");
 
 // Check if the connection is successful
 if (!$conn) {
     die("Connection failed: " . pg_last_error());
     echo 'Connection attempt failed.';
 
 }

 



 // REGISTER USER
 if (isset($_POST['reg_user'])) {
      // receive all input values from the form and sanitise
        $username = pg_escape_string($conn, $_POST["username"]);
        $email = pg_escape_string($conn, $_POST["email"]);
        $password_1 = pg_escape_string($conn, $_POST["password_1"]);
        $password_2 = pg_escape_string($conn, $_POST["password_2"]);
       
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
        if (empty($username)) {
            $errors[] = "Name is required.";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }

        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
          }

    
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = pg_query($conn, $user_check_query);
  $user = pg_fetch_assoc($result);
  
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = password_hash($password_1, PASSWORD_BCRYPT);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	pg_query($conn, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
 }

// LOGIN USER

if (isset($_POST['login_user'])) {
  $username = pg_escape_string($conn, $_POST['username']);
  $password = pg_escape_string($conn, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$query = "SELECT * FROM users WHERE username='$username'";
  	$results = pg_query($conn, $query);
    
  	if (pg_num_rows($results) == 1) {
      $row = pg_fetch_assoc($results);
      if (password_verify($password, $row['password'])) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
}
  }
}


?>
