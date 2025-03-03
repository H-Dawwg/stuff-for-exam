<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name  = trim( $_POST["name"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $confirm_password = trim($_POST["confirm_password"]);
        $errors = [];

        if (empty($name)) {
            $errors[] = "Name is required";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email is invalid";
        }

        if (empty($password)) {
            $errors[] = "Password is required";
        }

        if ($password !== $confirm_password) {
            $errors[] = "Passwords do not match";
        }

        if (empty($errors)) {
            echo "form submitted successfully";
        } else {
            foreach ($errors as $error) {
                echo "<p style='color:red;'>$error</p>";
            }
        })
?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);   
        $confirm_password = htmlspecialchars($_POST["confirm_password"]);
        echo "Hello, $name! your email is $email."
    }
?>

<?php
    //******** sanitisation function *********/

    function sanitiseInput($data) {
        // Reomve extra white space from the beginning and the end
        $data = trim($data);
        // Remove backslashes (/) which could be used in SQL injection
        $data = stripslashes($data);
        // Convert special characters to HTML entities to prevent XSS attacks
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        return $data;
    }

    //******** Usage example *********/

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = sanitiseInput($_POST["name"]);
        $email = sanitiseInput($_POST["email"]);
        $password = sanitiseInput($_POST["password"]);
        $confirm_password = sanitiseInput($_POST["confirm_password"]);
        echo "sanitised name: $name<br>";
        echo "sanitised email: $email<br>";
    }
?>