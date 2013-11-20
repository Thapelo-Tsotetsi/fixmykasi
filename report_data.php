
<?php
    
  require './config/dbconnect.php'; 
    try {
	
        $db = new PDO($con, $username, $password);
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        
        $sth = $db->query("SELECT * FROM $table_name_report");
        $results = $sth->fetchAll();
        
        echo json_encode( $results );
        
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $db = null;
 ?>