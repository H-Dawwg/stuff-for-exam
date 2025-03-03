<?php
    //Connect to database
    //Database connection settings
    $host = "82.165.6.246";
    $dbname = "harry_server";
    $username = "";
    $password = "";

    //Establish a connection to Postgres SQL
    $conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

    //Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . pg_last_error());
        echo "Connection failed attempt";
    }
    else {
        echo "Connection successful";
    }
    //SQL query to create the users table
    $query = "
    CREATE TABLE IF NOT EXISTS users (
        id SERIAL PRIMARY KEY,
        username VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP"
    );

    //Execute the query
    $result = pg_query($conn, $query);

    //Check if the table was created successfully
    if ($result) {
        echo "Table 'users' created successfully"
    } else{
        echo
    }

    //Clost the database connection
    pg_close($conn);
?>