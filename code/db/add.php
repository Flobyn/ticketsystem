<?php
session_start();
include('numbergenerate.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
	function get_data() {
        $user = $_POST['user'];
        $type = $_POST['reason'];

		$file_name='../tickets'. $user .'.json';
 
		if(file_exists("$file_name")) {
            $number = generateRandomString($type, $file_name);
            // echo $var;

			$current_data=file_get_contents("$file_name");
			$array_data=json_decode($current_data, true);

            $_SESSION['number'] = $number;
			$_SESSION['user'] = $user;

			$extra=array(
				'Name' => $_POST['name'],
				'Reason' => $_POST['reason'],
				'Number' => $number,
                'Question' => $_POST['question'],
			);
			$array_data[]=$extra;
			return json_encode($array_data);
		}
		else {
			$datae=array();
			$datae[]=array(
				'Name' => $_POST['name'],
				'Reason' => $_POST['reason'],
				'Number' => $number,
                'Question' => $_POST['question'],
			);
			return json_encode($datae);
		}
	}
    $user = $_POST['user'];
	$file_name='../tickets'. $user. '.json';

	if(file_put_contents("$file_name", get_data())) {
        header("location: ../number.php");
        // echo "<br>ja even testen he";
    }

	else {
		echo 'There is some error';
	}
    
}

?>
