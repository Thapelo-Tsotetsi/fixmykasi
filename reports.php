<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Fixmykasi &middot; local reporting app</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">

    <!-- googlemapjs -->
    <script type="text/javascript" src="../assets/js/googlemap-v3.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

    <style type="text/css">
      body{
        padding-top: 20px;
        padding-bottom: 40px;

      }

      #map-canvas{
        margin: 0;
        padding: 0;
        height: 100%;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>


<body onload="initialize()">





    <div class="container-narrow">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li><a href="index.html">Home</a></li>
          <li><a href="report.html">Report Problem</a></li>
          <li><a href="reports.html">All Reports</a></li>
          <li><a href="details.html">Details</a></li>
          <li class="active"><a href="contact.html">Contact</a></li>
        </ul>
        <h3 class="muted">Fixmykasi</h3>
      </div>


      <div class="jumbotron">

      </div>



<table class="table table-striped table-hover">
      


                              

    
      <thead>
        <tr>
            <h4>City of Cape Town(Resolved)</h4>
        </tr>
        <tr>
          <th>#</th>
          <th>Report</th>
          <th>Area</th>
          <th>Assigned Company</th>
          <th style="width: 36px;"></th>
        </tr>
      </thead>
      <tbody>
       

  <?php

  require './config/dbconnect.php';
  $con = mysql_connect($hostname, $username, $password) or
    die("Could not coneect to mysql");

  mysql_select_db("$databasename") or
    die("Could not select database");



    $query = "SELECT * FROM $table_name_report";
    $result = mysql_query($query) or die(mysql_error());
    //$row = mysql_fetch_array($result) or die(mysql_error());






    while($row=mysql_fetch_array($result)){
      //echo $row['province'];
      //echo "<br>";


      echo "<tr>";
      echo "<td>".$row['type']."</td>";
      echo "<td>".$row['subject']."</td>";
      echo "<td>".$row['municipality']."</td>";
      echo "<td><select style='width: 99%' name='type' id='type'>";
      echo "<option value='City'>City of Cape Town </option>";
      echo "<option value='Trash'>TrashBins and Co </option>";
      echo "<option value='Road Maintenance'>Sanral Pty Ltd </option>";
      echo "</select> </td>";
      echo "</tr>";
    }

mysql_close($con);

?>  


      </tbody>
    </table>








      <hr>

      <div class="footer">
        <p>&copy; Fixmykasi 2013</p>
      </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>