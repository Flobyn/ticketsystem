<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="stylesheet" href="./css/loginpage.css">
    <!-- CSS only -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid  d-none d-sm-block">
        <h1 class="text-center title-white">Ticket beheer</h1>

        <form method="POST" class="login" action="./db/validate.php">
        <h3>Login here</h3>

            <label for="username">Username</label>
            <input type="text" placeholder="Username" id="username" name="user" value="" required>

            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password" name="password" value="" required>

            <input id="button" type="submit" value="login">
        </form> 
        <div class="row position-absolute bottom-0 end-0">
            <div class="col-10"></div>    
            <div class="col-2">
                <img src="./image/aventus_logo.png" alt="Aventus logo" class="logo">
    	    </div>
            
        </div>
        
    </div>

    <div class="containter-fluid d-block d-sm-none">
	    <h1 class="text-center title-white">Je scherm is helaas te klein</h1>
    </div>
</body>
</html>
