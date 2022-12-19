<?php
$user = $_GET["user"];
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="stylesheet" href="./css/ticketask.css">
<!-- CSS only -->
<link href="./css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
		<?php 
		$filename='tickets'. $user .'.json';
		$content = json_decode(file_get_contents($filename), true);
		$lenght = count($content);
		?>

        <div class="row <?php if($lenght > 90){echo 'd-none';} else{echo 'd-block';}?>" >
            <div class="col"></div>
<!-- TODO opvang limit 95 -->
	        <form method="post" class="col-md-8" action="./db/add.php">

				<div id="head">
					<h1 id="heading">Ticket aanvraag</h1>
				</div>
				<br />
				<div id="input_name" class="input">
					<input id="user" type="hidden" name="user" value="<?php echo $user; ?>">
				</div>
                <div id="input_name" class="input">
					<input id="name" type="text" Placeholder="Naam" name="name" pattern="[A-Za-z].{2,}" required>
				</div>
				<div id="input_class" class="input">				
                    <select name="reason" id="reason" required>
                        <option value="Algemene">Algemene vraag</option>
                        <option value="Technische">Technische vraag</option>
                    </select> 
                </div>
                <div id="input_name" class="input">
					<input id="question" type="text" Placeholder="Korte omschrijving van je vraag" name="question">
				</div>

				<div class="id input">
					<input class="button" type="submit"
						name="submit" value="submit"
						onclick="on_submit()">
				</div>
		
	        </form>
            <div class="col"></div>
      <!--  <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <img src="./image/aventus_logo.png" alt="Aventus logo" class="logo  position-absolute bottom-0 start-50 translate-middle-x">
    	    </div>
            <div class="col-1"></div>--->
        </div>
		<div class="row <?php if($lenght > 90){echo 'd-block';}else{echo 'd-none';} ?>">
			<div>Helaas is de wachtrij te lang probeer het later nog een keer<br>de pagina refreshen is genoeg om het te checken</div>
		</div>
    </div>
    
</body>

</html>
