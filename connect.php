<?php
	$server = "localhost";
    $username = "root";
    $password = "";
    $db = "kyte";

    $db = mysqli_connect($server, $username, $password, $db);

    function sanitize($dirty)
	{
	    return htmlentities($dirty,ENT_QUOTES,"UTF-8");
	}
?>