<?php
	session_start();
	require 'include/connect.php';
	$session55 = session_id();

		$history = "UPDATE user_history SET action ='2' WHERE session='$session55'";

		// echo $history; exit;
		if (mysqli_query($link, $history)) {
			echo "string";
		}else{
			echo "bye";
		}

	session_destroy();
	header("Location: ../index.php");
?>
