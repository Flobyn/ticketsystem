<?php
session_start();

// stop session en terug naar inlog pagina
session_destroy();
header( "Location: ../login.php" );
?>