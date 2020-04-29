<?php
	
	if (isset($_SESSION['user_email']))
		var_dump($_SESSION['user_email']);
	else
		var_dump($_SESSION);
?>