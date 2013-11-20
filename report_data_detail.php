  <?php

  require './config/dbconnect.php';
  $con = mysql_connect($hostname, $username, $password) or
    die("Could not coneect to mysql");

  mysql_select_db("$databasename") or
    die("Could not select database");

    $id = $_GET['id'];


    $query = "SELECT * FROM $table_name_report WHERE report_id=$id";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result) or die(mysql_error());

    echo json_encode($row);


mysql_close($con);
?>