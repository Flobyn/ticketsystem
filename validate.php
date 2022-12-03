<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../control.php");
    exit;
}
require_once('db.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// opgegeven username en ww
	$username = $_POST["user"];
	$password = $_POST["password"];

    $sql = "SELECT * FROM inlog WHERE user = :username AND password = :password";
    $result = $conn->prepare($sql);
    $result->execute([':username'=>$username, ':password'=>$password]);
    $count = $result->rowCount();

    // $data = $result->fetchAll();
    // foreach($data as $row){
    //         echo $row['user']."<br/>\n";
    //     }
    if ($count == 1) {
        $_SESSION['valid'] = true;
        $_SESSION['user'] = $username;
        header("location: ../control.php");
    } else {
        header("location: ../login.php");
    }

}
$conn->close();

?>