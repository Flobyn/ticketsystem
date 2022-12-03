<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="stylesheet" href="./css/loginpage.css">
    <!-- CSS only -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center title-white">Ticket beheer</h1>

        <form method="POST" class="login" action="./db/validate.php">
        <h3>Login here</h3>

            <label for="username">Username</label>
            <input type="text" placeholder="Username" id="username" name="user" value="" required>

            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password" name="password" value="" required>

            <input id="button" type="submit" value="login">
            

        </form> 
    </div>
</body>
</html>
