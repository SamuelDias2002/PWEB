<?php

// Abra a base de dados como objeto PDO (ou com a extensão mysqli se preferir)
$servername = "localhost";
$username = "username";
$password = "password";

$exercisedb = new mysqli($servername, $username, $password);
if ($exercisedb->connect_error) {
  die("Connection failed: " . $exercisedb->connect_error);
}

echo "Connected successfully";


$criar = "CREATE TABLE Users (Id INTEGER PRIMARY KEY, Username VARCHAR(100), PASSWORD_HASH VARCHAR(40), EMAIL VARCHAR(20))";
if ($exercisedb->query($criar) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error: " . $criar . "<br>" . $exercisedb->error;
}


$inserirDados = "INSERT INTO Users (Username, PASSWORD_HASH, EMAIL)
VALUES ('Guilherme', '123', 'guilhermeteixeira1313@gmail.com')";
mysqli_query($conn, $inserirDados);


$getData = "SELECT Username, PASSWORD_HASH, EMAIL FROM Users";
$result = $conn->query($getData);
if ($result->num_rows > 0) {
  echo "<table>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["Username"]. "</td><td>" . $row["PASSWORD_HASH"]. "</td><td>" . $row["EMAIL"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

// Fechar conexão à BD
$exercisedb->close();
?>