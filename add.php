<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
	function get_data() {
		$name = $_POST['name'];
        $user = $_POST['user'];

		$file_name='../tickets'. $user .'.json';
 
		if(file_exists("$file_name")) {
			$current_data=file_get_contents("$file_name");
			$array_data=json_decode($current_data, true);
			// check lengte
			$lenght = count($array_data);
			$last = $lenght -1;
			$newnumber = $array_data[$last]["Number"] +1;	// wordt het ticket nummer
            
            $_SESSION['number'] = $newnumber;
			$_SESSION['user'] = $user;

			$extra=array(
				'Name' => $_POST['name'],
				'Reason' => $_POST['reason'],
				'Number' => $newnumber,
			);
			$array_data[]=$extra;
			return json_encode($array_data);
		}
		else {
			$datae=array();
			$datae[]=array(
				'Name' => $_POST['name'],
				'Reason' => $_POST['reason'],
				'Number' => $newnumber +1,
			);
			return json_encode($datae);
		}
	}
    $user = $_POST['user'];
	$file_name='../tickets'. $user. '.json';

	if(file_put_contents("$file_name", get_data())) {
        header("location: ../number.php");
    }

	else {
		echo 'There is some error';
	}
}

?>
