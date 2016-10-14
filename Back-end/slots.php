<?php
	/* This is just bare bones of sending the necessary info to front end.
	I'll be adding for example the sql requests here soon and actually work
	on the back end stuff more. */

	$park1 = array(
		'parkId' => 1,
		'slots' => 5
	);

	$park2 = array(
		'parkId' => 2,
		'slots' => 0
	);

	$park3 = array(
		'parkId' => 3,
		'slots' => 11
	);

	echo '<script>';
	echo 'var park1 = ' . json_encode($park1) . ';';
	echo 'var park2 = ' . json_encode($park2) . ';';
	echo 'var park3 = ' . json_encode($park3) . ';';
	echo '</script>';
?>