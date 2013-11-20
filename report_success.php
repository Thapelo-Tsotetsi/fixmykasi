<?php
	require './config/dbconnect.php';

	$province = $_REQUEST["province"];
	$municipality = $_REQUEST["municipality"];
	$subject = $_REQUEST["subject"];
	$problem = $_REQUEST["problem"];
	$name = $_REQUEST["name"];
	$contact = $_REQUEST["contact"];
	$picture = $_REQUEST["picture"];
	$latitude = $_REQUEST["latitude"];
	$longitude = $_REQUEST["longitude"];


	$con = mysql_connect($hostname, $username, $password) or
		die("Could not coneect to mysql");

	mysql_select_db("$databasename") or
		die("Could not select database");

/*
* Inserts staff into database.
*/	

	$sql = "INSERT INTO $table_name_report(municipality, subject, problem, name, contact, province, latitude, longitude, date, picture)
			VALUES
				('$municipality','$subject','$problem','$name','$contact','$province','$latitude','$longitude','12-12-2013','$picture')";

	mysql_query($sql) or die("Error inserting values".mysql_error()); 

	mysql_close($con);

	echo "$province $municipality";
?>