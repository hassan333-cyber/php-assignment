<?php
$servername = "localhost";
$username = "root";
$password = "Crpty_123@";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
// $sql = "CREATE TABLE books (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     bookName VARCHAR(30) NOT NULL,
//     publisher VARCHAR(30) NOT NULL,
//     isbn VARCHAR(50),
//     thumbnail VARCHAR(50),
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//     )";

// if ($conn->query($sql) === TRUE) {
//   echo "Table created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }
// $conn->close();
?>