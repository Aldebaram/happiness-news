<?php
//MySQL database connection information
$servername = "127.0.0.1";
$username = "root";
$password = "happynews";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}


// sql to create users table
$sql = "CREATE TABLE julio_users (
user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
login VARCHAR(12) NOT NULL UNIQUE,
password VARCHAR(12) NOT NULL,
avatar   VARCHAR(32) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo " Table Users created successfully";
} else {
    echo " Error creating table: " . $conn->error;
}



// sql to create news table
$sql = "CREATE TABLE julio_noticias (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
titulo VARCHAR(30) NOT NULL,
slug VARCHAR(30) NOT NULL,
descricao VARCHAR(100) NOT NULL,
keywords  VARCHAR(50) NOT NULL,
conteudo  VARCHAR(400) NOT NULL,
dataHora TIMESTAMP NOT NULL,
FOREIGN KEY fk_user(user_id)
   REFERENCES julio_users(user_id)

)";

if ($conn->query($sql) === TRUE) {
    echo " Table Noticias created successfully";
} else {
    echo " Error creating table: " . $conn->error;
}

$conn->close();
?>
