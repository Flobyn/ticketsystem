<?php
session_start();

$ticket_number = $_SESSION['number'];

if ( isset( $_SESSION['user'] ) ) {
	
} else {
    echo "er ging iets fout";
}
$input = array("https://giphy.com/embed/QBd2kLB5qDmysEXre9", "https://giphy.com/embed/sCYuLA9j0w8AP9XUfn", "https://giphy.com/embed/MgRKCBGvlpqTENUzWk", "https://giphy.com/embed/2WGDUTmsB4DzFuvZ2t");
        $rand_keys = array_rand($input, 2);
?>
<html>
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="stylesheet" href="./css/ticketask.css">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
        
        <iframe width="560" height="315" src="https://www.youtube.com/embed/VBlFHuCzPgY?controls=0&amp;clip=UgkxfiqLfNFo7s0vEXdI_Ptrgl1nwoirbe3z&amp;clipt=ELnOAxjRmAc&autoplay=1" hidden></iframe>

    <div class="container-fluid">
        <div class="submit">
			<span><?php echo $ticket_number; ?></span>
		</div><br>
        <div class="row">
            <div class="col-6"><a href="https://offline-dino-game.firebaseapp.com/" target="_blank"><button  type="button" class="btn btn-light float-end">dinosauris game</button></a></div>
            <div class="col-6"><a href="http://tictacteen.epizy.com/" target="_blank"><button  type="button" class="btn btn-light float-start">Tic Tac Toe game</button></a></div>
        </div><br>
        <div style="width:100%;height:0;padding-bottom:60%;position:relative;"><iframe src="<?php echo $input[$rand_keys[0]]; ?>" width="100%" height="100%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div>

        
    </div>

    </body>
</html>
