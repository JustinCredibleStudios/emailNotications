<?php 
include 'config.php';

$conn = new mysqli($host, $username, $password, $dbname);

$sql = "SELECT email FROM email_notififationsystem";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}


?>