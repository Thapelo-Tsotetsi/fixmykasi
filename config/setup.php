<?php
	require 'dbconnect.php';


	$con = mysql_connect($hostname, $username, $password) or
		die("Could not coneect to mysql");

	mysql_query("DROP DATABASE IF EXISTS $databasename") or
		die("Could not drop the database".mysql_error());

	mysql_query("CREATE DATABASE IF NOT EXISTS $databasename") or
	    die("creating database fails... <br />".mysql_error());
	
	mysql_select_db("$databasename") or
		die("Could not select database");

/*
* Creating tables for Fixmykasi
*/

    mysql_query("CREATE TABLE IF NOT EXISTS $table_name_report (
    				report_id INT AUTO_INCREMENT,
    				type VARCHAR(255) NOT NULL,
    				municipality VARCHAR(255) NOT NULL,
    				subject VARCHAR(255) NOT NULL,
    				problem VARCHAR(255) NOT NULL,
    				name VARCHAR(255) NOT NULL,
    				contact VARCHAR(255) NOT NULL,
    				province VARCHAR(255) NOT NULL,
    				latitude VARCHAR(255) NOT NULL,
    				longitude VARCHAR(255) NOT NULL,
    				date VARCHAR(255) NOT NULL,
    				imagename VARCHAR(255) NOT NULL,
    				PRIMARY KEY (report_id)
    	       )") or die("Error creating tables".mysql_error());

        mysql_query("CREATE TABLE IF NOT EXISTS person (
    				person_id INT AUTO_INCREMENT,
    				type VARCHAR(255) NOT NULL,
    				company_name VARCHAR(255) NOT NULL,
    				name VARCHAR(255) NOT NULL,
    				surname VARCHAR(255) NOT NULL,
    				contact VARCHAR(255) NOT NULL,
    				job VARCHAR(255) NOT NULL,
    				PRIMARY KEY (person_id)
    	       )") or die("Error creating tables".mysql_error());

        mysql_query("CREATE TABLE IF NOT EXISTS comment (
                    comment_id INT AUTO_INCREMENT,
                    report_id INT,
                    comments VARCHAR(255) NULL,
                    PRIMARY KEY (comment_id),
                    FOREIGN KEY (report_id) REFERENCES $table_name_report(report_id)

               )") or die("Error creating tables".mysql_error());

/*
* Inserting data into tables
*/

	$sql = "INSERT INTO $table_name_report(type, municipality, subject, problem, name, contact, province, latitude, longitude, date, imagename)
			VALUES
				('Pothole','Qwaqwa','Mampoi Road last robot','Problem with the robots','Thapelo','0832786313','Free State','-25.73794163172466','28.215293884277344','12-12-2013','thumb_previous-50898090.png'),
				('Protest','Phuthas','Mmota Road last robot','The stop sign not visible','Tumelo','0735968463','Free State','-25.737477738443335','28.201217651367188','12-12-2013','thumb_bg-footer-566592668.jpg'),
				('Electricity','Hasethunya','Drainage messedup','Please fix the drainage in.','Thiza','0832893433','Free State','-25.735748428906025','28.216323852539062','12-12-2013','thumb_bg-footer-566592668.jpg')";

	$sql = "INSERT INTO person(type,company_name, name, surname, contact, job)
			VALUES
				('Electricity','Hasethunya','Lee','Tumelo','Drainage messedup','Please fix the drainage in.')";	



	mysql_query($sql) or die("Error inserting values".mysql_error()); 

	mysql_close($con);
?>

