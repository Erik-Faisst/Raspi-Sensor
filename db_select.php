<?php
$db_link = mysqli_connect ( 'localhost',
							'admin',
							'admin123',
							'raspisensor');
							
$query = mysqli_query($db_link, "SELECT * FROM wp_diagramm ORDER BY datum");

$array = array();
$personCount = 0;

while($row = mysqli_fetch_assoc($query)) {
	$array[] = $row;
	$personCount = sizeof($array);
}
?>
