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
        <div class="row">
            <div class="col"></div>

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
                    <!-- <label for="reason">Wat voor type vraag:</label> -->

                    <select name="reason" id="reason" required>
                        <option value="Algemene vraag">Algemene vraag</option>
                        <option value="Technische vraag">Technische vraag</option>
                    </select> 
                </div>

				<div class="id input">
					<input class="button" type="submit"
						name="submit" value="submit"
						onclick="on_submit()">
				</div>
		
	        </form>
            <div class="col"></div>
    </div>
</body>

</html>
