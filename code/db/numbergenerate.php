<?php 
function generateRandomString($type, $file_name) {
    // echo "test";
    $file_name=$file_name;
    // echo $file_name;
    
    if($type == 'Technische'){
        $character = "T";
    }
    else{
        $character = "A";
    }

    $randomNum = rand(1,100);

    $newNumber = $character . $randomNum;

    $content = json_decode(file_get_contents($file_name), true);
    $lenght = count($content);
 
        if($lenght == 0){
            return $newNumber;
        }
        else{

            for ($i=0; $i < $lenght; $i++) {
                // echo $i . ' ' . $content[$i]["Number"] . ' == ' . $newNumber . '<br>';
                if($content[$i]["Number"] == $newNumber)
                {
                    $randomNum = rand(1,100);
                    $newNumber = $character . $randomNum;

                    $i = -1;
                }

            }
            // echo ' else '. $newNumber . '<br>';
            $newNumber;
            return $newNumber;
        }
    // }
    // echo "test onderaan";
    return $newNumber;
}

?>