<?php
$servername = "mysql";
$username = "root";
$password = "password";
$dbname = "redlock";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->select_db($dbname);
$count = 0;


$sql = "SELECT ID, Nama, Alamat, Jabatan FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $count = $count + 1;
        echo "ID: ". $row["ID"]. " - Nama: ". $row["Nama"]. " - Alamat " . $row["Alamat"]. " - Jabatan " . $row["Jabatan"]. "<br>";
    }
} else {
    echo "0 results";
}

echo "usercount: ".$count;
$conn->close();
?>