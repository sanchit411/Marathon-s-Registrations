
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Confirmation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/jquery-ui.css">
 <!-- CSS -->
 <link rel="stylesheet" href="mystyle.css" >
  <!-- Optional JavaScript -->
  
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="jquery/jquery.js"></script>
  
  <script src="jquery/jquery-ui.js"></script>
  <script src="main.js"></script>
  <script src="bootstrap/js/bootstrap.min.js" ></script>  
</head>
<body class="display-content">
<div class="container">
  <h2>We will see you on 3 December 2017 at Marathon </h2>

  <div class="panel-group">
    <div class="panel panel-primary">

<?php
echo <<<ENDBLOCK
    <div class="panel-heading">$params[0], thank you for registering.</div>
    <div class="panel-body">
  
    <table class= "table-bordered table-striped">
        <tr>
            <td>Address</td>
            <td>$params[3].$params[4]</td>
        </tr>
        <tr>
            <td>City</td>
            <td>$params[6]</td>
        </tr>
        <tr>
            <td>State</td>
            <td>$params[5]</td>
        </tr>
        <tr>
            <td>Zip Code</td>
            <td>$params[7]</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>$params[9]</td>
        </tr>           
    </table>
    </div>
    </div>                          
ENDBLOCK;

?>
</div>
</div>
</body>
</html>
