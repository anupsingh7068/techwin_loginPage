
<?php
include "config.php";


if(session_destroy()) 
{
header("Location: login.php");
}
?>