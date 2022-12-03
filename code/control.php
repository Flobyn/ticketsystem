<?php 
include 'db/db.php';
session_start();

if ( isset( $_SESSION['user'] ) ) {
	$user = $_SESSION['user'];
} else {
    // Redirect them to the login page
    header("Location: login.php");
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="stylesheet" href="./css/loginpage.css">
    <!-- CSS only -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid d-none d-sm-block">
	<a href="./db/logout.php" id="button">Logout</a>
	<br>

	<?php
		$filename = "tickets$user.json";
		
		if(isset($_POST['button1'])) {
			$data = file_get_contents($filename);
		
			$json = json_encode(array_slice(json_decode($data, true), 1));
			file_put_contents($filename, $json);
		}
		if(isset($_POST['button2'])) {
			file_put_contents($filename, json_encode([]));
		}				
	?>
	<div class="row"> 
		<main class="col-md-4">

			<form method="post">
				<input type="submit" id="button2" name="button1" value="Next"/>
				<input type="submit" id="button2" name="button2" value="Reset"/>

                <a href="http://tickets.rf.gd?user=<?php echo $user; ?>" target="_blank" class="startbutton">Start</a>
			</form>
            

		</main>
		<?php
		$content = json_decode(file_get_contents($filename), true);
		// print_r($content);

		$lenght = count($content);
		?>
		<side class="col-md-8" id="refresh-me">
			<div class="side">
				<div class="row underline"> 
					<h2 class="col-1"><?php echo $content[0]["Number"]; ?></h2>
					<h2 class="col"><?php echo $content[0]["Name"]; ?></h2>
					<h2 class="col"><?php echo $content[0]["Reason"] ; ?></h2>
				</div>
				<?php
					for($i=1; $i < $lenght; $i++){
				?>
				<div class="row textcolor"> 
					<h3 class="col-1"><?php echo $content[$i]["Number"]; ?></h3>
					<h3 class="col"><?php echo $content[$i]["Name"]; ?></h3>
					<h3 class="col"><?php echo $content[$i]["Reason"] ; ?></h3>
				</div>
				<?php
					}
				?>
			</div>
		</side>
	</div>
</div>

<div class="containter-fluid d-block d-sm-none">
	<a href="./db/logout.php" id="button">Logout</a>
		<br><br>
		
	<h1 class="text-center title-white">Je scherm is helaas te klein</h1>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    var previous = null;
    var current = null;
    setInterval(function() {
        $.getJSON("<?php echo $filename; ?>", function(json) {
            current = JSON.stringify(json);            
            if (previous && current && previous !== current) {
                console.log('refresh');
                $("#refresh-me").load(window.location.href + " #refresh-me" );
                // location.reload();
            }
            previous = current;
        });                       
    }, 2000);   
</script>
</body>
</html>
