<?
    error_reporting(E_ALL);
ini_set("display_errors", 1);
$link = mysqli_connect('localhost', 'my_user', 'my_password', 'my_db');

if (!$link) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}

echo 'Connected... ' . mysqli_get_host_info($link) . "\n";
    ?>