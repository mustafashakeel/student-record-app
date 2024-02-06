<?php
//  Server Variables 
// $server = 'localhost';
// $user = 'root';
// $password = 'root';
// $database = 'studentDB';

// Server Constants 
// define('SERVER', 'localhost');
// define('USER', 'root');
// define('PASSWORD', 'root');
// define('DATABASE', 'studentDB');

//  lets use Const keyword to define the Server Variables

const SERVER = "localhost";
const USER = "root";
const PASSWORD = "root";
const DATABASE = "studentDB";



// methos 1 : Procedural 

// $db = mysqli_connect($server, $user, $password, $database);
$db = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
if ($db === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
    // echo "Connected Successfully";
}


// Method 2 : Object Oriented
// $db = new mysqli($server, $user, $password, $database);
// if ($db->connect_error) {
//     die("ERROR: Could not connect. " . $db->connect_error);
// } else {
//     echo "Connected Successfully";
// }

// Method 3 : PDO
// try {
//     $db = new PDO("mysql:host=$server; dbname=$database", $user, $password);

//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }
