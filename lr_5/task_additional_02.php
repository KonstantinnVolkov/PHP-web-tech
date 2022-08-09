<!--Connects to DB and prints all data from it-->
<?php

$DB_HOST = 'localhost';
$DB_USER = 'konstantin';
$DB_PASS = '3ed815';
$DB_NAME = 'tetsTable';

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM `userData`";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table>".PHP_EOL.
        "<tr>".
        "<th>ID</th>".
        "<th>NAME</th>".
        "<th>PASS</th>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>".
            "<td>".$row["id"]."</td>".
            "<td>".$row["name"]."</td>".
            "<td>".$row["pass"]."</td>".
            "</tr>";
    }
} else {
    echo "0 results";
}
$conn->close();