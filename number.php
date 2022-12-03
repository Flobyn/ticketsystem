<?php
session_start();

$ticket_number = $_SESSION['number'];

if ( isset( $_SESSION['user'] ) ) {
	
} else {
    echo "er ging iets fout";
}
?>
<html>
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="stylesheet" href="./css/ticketask.css">
	</head>
	<body>
		<div class="submit">
			<span><?php echo $ticket_number; ?></span>
		</div>
	</body>
</html>
