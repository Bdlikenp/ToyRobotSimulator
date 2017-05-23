<?php
	include 'lib/class.run.php';
	
	if (sizeof($argv) == 1)
		print('First argument must be a filename');
	else
		$run = new Run($argv);	
?>