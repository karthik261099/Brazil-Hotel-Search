<?php
/*
Template Name: downloadCsvTemplate.php
*/
?>
<?php
if(isset($_GET['downloadCsvTemplate'])){  

	$file = ("template.csv");

	$filetype=filetype($file);

	$filename=basename($file);

	header ("Content-Type: ".$filetype);

	header ("Content-Length: ".filesize($file));

	header ("Content-Disposition: attachment; filename=".$filename);

	readfile($file);
}
?>