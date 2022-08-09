<!--Connects to DB and prints it version-->
<?php
$DB_HOST = '127.0.0.1';
$DB_USER = 'konstantin';
$DB_PASS = '3ed815';

$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);
if (!$link) {
    die('Connection err: ' . mysqli_error());
}
printf("%s\n", mysqli_get_server_info($link));
mysqli_close($link);