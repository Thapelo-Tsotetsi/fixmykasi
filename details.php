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

    <style type="text/css">
      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        position: absolute;
        right: 50px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
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

<body onload="initialize2()">

    <div class="container-fluid">
      <a class="brand" href="#"></a>
      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li><a href="index.html">Home</a></li>
          <li><a href="report.html">Report Problem</a></li>
          <li><a href="reports.html">All Reports</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
             <h3 class="muted"> <a href="#"><img src="../assets/img/fixmykasi-logo2.png"></a></h3>

      </div>

      <hr>
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

mysql_close($con);
?>

      <div class="row-fluid marketing">
                <form class="form-signin">
        <h2 class="form-signin-heading">Detailed | Report</h2>
        
        <p>
            We will only use your personal information in accordance with government <a href="#">privacy policy</a>.
            Please be polite, concise and to the point.
            Please do not be abusive — abusing your council devalues the service for all users.
            Writing your message entirely in block capitals makes it hard to read, as does a lack of punctuation.
            Remember to come back on the site to rate and comment about the service te progress the give
            feed-back where possible.

        </p>    

          <h4>Municipality</h4>
          <p> <?php echo $row['municipality'];?></p>

          <h4>Problem</h4>
          <p> <?php echo $row['problem'];?></p>

          <h4>Date</h4>
          <p> <?php echo $row['date'];?></p>

        <h6>Discuss | Provide Feeedback | Comment</h6>
        <p> <?php echo "&#8594;Tumelo: Hello comment number 1";?></p>
        <p> <?php echo "&#8594; Thabo: This is comment number 2";?></p>
        <textarea rows="3" class="input-block-level" placeholder="Discussion and Comments about the problem"></textarea>
        <button class="btn btn-large btn-primary" type="submit">Submit Comments</button>
      </form>


<div id="map-canvas" style="
      width: 61%; 
      height: 787px;

         background: #fcfcfc;
         -webbkit-border-radius:2px;
         -moz-border-radius:2px;
         border-radius: 2px;
         -webkit-box-shadow: 0px 1px 1px rgba(0,0,0,.35);
            -moz-box-shadow: 0px 1px 1px rgba(0,0,0, .35);
                 box-shadow: 0px 5px 15px rgba(0,0,0, .35);"></div>

        <div class="span6">
          
        </div>

      </div>

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
