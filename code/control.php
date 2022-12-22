<?php 
include 'db/db.php';
include 'db/order.php';
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
	<script src="./js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid d-none d-sm-block">
	<a href="./db/logout.php" id="button">Logout</a>
	<br>
	
	<?php
		$filename = "tickets$user.json";
        $next_sound = "./sounds/next.mp3";
		
		if(isset($_POST['button1'])) {
			$data = file_get_contents($filename);
		
			$json = json_encode(array_slice(json_decode($data, true), 1));
			file_put_contents($filename, $json);
            echo '<audio autoplay="true" style="display:none;">
            <source src="'.$next_sound.'">
            </audio>';
		}
		if(isset($_POST['button2'])) {
			file_put_contents($filename, json_encode([]));
		}	

		if(isset($_POST['prio'])) {
			$num = $_POST['prio'];
			reorder($num, $filename);
		}			
	?>
    
    <div class="row">
        <div class="col-2"></div>
        <h1 class="textcolor col-8 text-center" data-bs-toggle="modal" data-bs-target="#infomodal">Ticket systeem &#x24D8;</h1>
        <div class="col-2"></div>
    </div><br>
	<div class="row"> 
		<?php
		$content = json_decode(file_get_contents($filename), true);

		$lenght = count($content);
		?>
		<main class="col-md-3">

			<form method="post">
				<input type="submit" id="button2" name="button1" value="Next"/>
				<input type="submit" id="button2" name="button2" value="Reset" onclick="return confirmDelete(this.href);"/>
                <a href="http://tickets.rf.gd?user=<?php echo $user; ?>" target="_blank" class="startbutton">Start</a>
			</form>

			<div id="refresh-me_too">
				<div class="now">
					<h2>Nu <?php echo $content[0]["Number"]; ?></h2>
					<?php
					if ($lenght > 0){
					?>
					<h3><?php echo $content[0]["Name"]; ?></h3>
					<h4><?php echo $content[0]["Reason"] ; ?></h4>
					<h3>Vraag:</h3><p><?php echo $content[0]["Question"] ; ?></p>
					<?php } ?>
				</div>
			</div>
		</main>

		<side class="col-md-9" id="refresh-me">
			<div class="side">
				<div class="row underline" > 
					<h3 class="col-1">Id</h3>
					<h3 class="col-3">Naam</h3>
					<h3 class="col-4">Type</h3>
					<h3 class="col-4">Vraag</h3>
				</div>
				<?php
					for($i=1; $i < $lenght; $i++){
				?>
				<div class="row" id="question_info" > 
					<h4 class="col-1"><?php echo $content[$i]["Number"]; ?></h4>
					<h4 class="col-3"><form method="post"><?php echo $content[$i]["Name"]; ?>
						
							<input type="hidden" name="prio" value="<?php echo $i; ?>"/>
							<button class="btn btn-outline-primary btn-sm" type="submit" name="submit" value="submit" style="visibility:<?php if($i == 1){echo "hidden";}else{echo "visible";} ?>;" >Prio</button>
						</form> 
					</h4>
					<h4 class="col-4"><?php echo $content[$i]["Reason"] ; ?></h4>
					<h4 class="col-4 truncate" data-bs-target="#questionModal" data-bs-toggle="modal" data-bs-naam="<?php echo $content[$i]["Name"]; ?>" data-bs-question="<?php echo $content[$i]["Question"] ; ?>"><?php echo $content[$i]["Question"] ; ?></h4>
				</div>
				<?php
					}
				?>
			</div>
            <div class="row">
                <div class="col-10"></div>    
                <div class="col-2">
                    <img src="./image/aventus_logo.png" alt="Aventus logo" class="logo">
                </div>
                    
            </div>
		</side>
	</div>

    

</div>
<!-- question modal -->
<div class="modal fade" id="questionModal" aria-hidden="true" aria-labelledby="questionModalLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="questionModalLabel">Info vraag</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
	  		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- screen to small -->
<div class="containter-fluid d-block d-sm-none">
	<a href="./db/logout.php" id="button">Logout</a>
		<br><br>
		
	<h1 class="text-center title-white">Je scherm is helaas te klein</h1>
</div>

<!--info Modal -->
<div class="modal hide fade" id="infomodal" tabindex="-1" aria-labelledby="infomodal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="infoModalLabel">Info gebruik</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<h5>Knoppen:</h5>
		<p>
		- Start: dan open je een scherm voor de leerlingen die zij kunnen scannen je moet die dan op het grote scherm zetten<br>
		- Next: laat de eerst volgende persoon aan de beurt zijn.<br>
		- Reset: maakt de lijst leeg<br>
		</p>
		<hr>
		<h5>Scherm:</h5>
		<p>
		Het scherm rechts in beeld zie je bovenaan wie er aan de beurt is en de wachtende eronder staan op volgorde.<br>
		Je ziet de nummer, naam, type vraag en eventueel de vraag die ze hebben.<br>
		Het scherm links onder de knoppen zie je wie er op het moment aan de beurt is en hun nummer, naam, type vraag en de eventuele vraag die ze hebben ingevuld.
		</p>
		<hr>
		<h5>Prioriteren:</h5>
		<p>
		De knop prio zorgt ervoor dat de gekozen persoon als eerst volgende aan de beurt zal zijn.
		</p>
		<hr>
		<h5>Extra:</h5>
		<p>Als je op de vraag van een leerling klikt krijg je de gehele vraag in beeld en de naam van wie de vraag is<br>
			Als je van de pagina geluid toelaat dan speelt er een geluidje af als er op next wordt gedrukt.</p>
	
		<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
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
				$("#refresh-me_too").load(window.location.href + " #refresh-me_too" );
                // location.reload();
            }
            previous = current;
        });                       
    }, 2000); 
	
	function confirmDelete(loc) { 
		if (confirm('Confirm you wish to delete this?')) { 
			return true;
		} 
		return false; // cancel the click event always 
	}

	var exampleModal = document.getElementById('questionModal')
	exampleModal.addEventListener('show.bs.modal', function (event) {
	// Button that triggered the modal
	var button = event.relatedTarget
	// Extract info from data-bs-* attributes
	var question = button.getAttribute('data-bs-question')
	var name = button.getAttribute('data-bs-naam')
	// If necessary, you could initiate an AJAX request here
	// and then do the updating in a callback.
	//
	// Update the modal's content.
	var modalTitle = exampleModal.querySelector('.modal-title')
	var modalBodyInput = exampleModal.querySelector('.modal-body')

	modalTitle.textContent = "Vraag van " + name
	modalBodyInput.textContent = question
	})

</script>
</body>
</html>
