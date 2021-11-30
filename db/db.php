<?php
$servername = "localhost";
$username = "root"; // default username for localhost is root
$password = "Thienbao4"; // default password for localhost is empty
$dbname = "friend_shop"; // database name
$port = 3308;

// Create connection
$db = new mysqli($servername, $username, $password, $dbname, $port);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// $servername = "localhost";
// $username = "root"; // default username for localhost is root
// $password = ""; // default password for localhost is empty
// $dbname = "friend_shop"; // database name

// // Create connection
// $db = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($db->connect_error) {
//     die("Connection failed: " . $db->connect_error);
// }
