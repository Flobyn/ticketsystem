<?php 
session_start();

if ( isset( $_GET["user"] ) ) {
	$user = $_GET["user"];
} else {
    // Redirect them to the login page
    header("Location: login.php");
}
?>
<!-- check if data is different and reload page if so -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="./css/style.css">
<!-- CSS only -->
<link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 align-self-start">
            <img src="https://chart.googleapis.com/chart?cht=qr&chl=http%3A%2F%2Ftickets.rf.gd%2Fgetticket.php?user=<?php echo $user; ?>&chs=180x180&choe=UTF-8&chld=L|2">
        </div>
        <?php
        $filename = "tickets$user.json";
        $content = json_decode(file_get_contents($filename), true);

        $lenght = count($content);
        ?>
        <div class="col-md-10">
            <div class="nextup">
                <span><?php echo $content[0]["Number"]; ?></span>
            </div>
            <div class="waiting">
                <?php
                for($i=1; $i < $lenght; $i++){
                ?>
                <div class="waitingnumbers"><?php  echo $content[$i]["Number"];?></div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    var previous = null;
    var current = null;
    setInterval(function() {
        $.getJSON("<?php echo $filename;?>", function(json) {
            current = JSON.stringify(json);            
            if (previous && current && previous !== current) {
                console.log('refresh');
                location.reload();
            }
            previous = current;
        });                       
    }, 2000);   
</script>

<!-- JavaScript Bundle with Popper -->
<script src="./js/bootstrap.bundle.min.js" ></script>
</body>
</html>
