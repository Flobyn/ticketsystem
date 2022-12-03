<?php

$host = "sql112.epizy.com";
$dbname = "epiz_30865082_school";
$username = "epiz_30865082";
$password = "vVBI1QdxGK4QXO";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // echo "Connected to $dbname at $host successfully.<br>";
    } catch (PDOException $pe) {
    die ("Could not connect to the database $dbname :" . $pe->getMessage());
    }
?> 