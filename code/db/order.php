<?php 
function reorder($chosen, $filename) {

	$arr = json_decode(file_get_contents($filename), true);
	// count how many
	$n = count($arr);
	// temporary array
	$temp = array();

	for($i = 0; $i < $n; $i++){

		if($arr[$chosen]["Number"] != $arr[$i]["Number"]){
			// every array that wasn't chose save
			$extra=array(
				'Name' => $arr[$i]["Name"],
				'Reason' => $arr[$i]["Reason"],
				'Number' => $arr[$i]["Number"],
                'Question' => $arr[$i]["Question"],
			);

			$temp[]=$extra;

		}
		if($arr[$chosen]["Number"] == $arr[$i]["Number"]){
			//  array that was chosen save to second position number 1
			$change[]=array(
				'Name' => $arr[$i]["Name"],
				'Reason' => $arr[$i]["Reason"],
				'Number' => $arr[$i]["Number"],
                'Question' => $arr[$i]["Question"],
			);

			array_splice($temp, 1, 0, $change);
		}	
		
	}
	$json = json_encode($temp);

	file_put_contents($filename, $json);

}


?>
