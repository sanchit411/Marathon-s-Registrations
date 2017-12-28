
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Report</title>
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
  <h2>List of the runner for Marathon 2017 </h2>

  <div class="panel-group">
<?php
$server = 'opatija.sdsu.edu:3306';
$user = 'jadrn003';
$password = 'potato';
$database = 'jadrn003';
if(!($db = mysqli_connect($server,$user,$password,$database)))
    echo "\nERROR in connection ".mysqli_error($db);
else {
    $sql = "select image_name,CONCAT(lastName,',',firstName), dob, expLevel from runner where category='teen' order by lastName ;";  
    $sql1 = "select image_name,CONCAT(lastName,',',firstName), dob, expLevel from runner where category='adult' order by lastName ;";
    $sql2 = "select image_name,CONCAT(lastName,',',firstName), dob, expLevel from runner where category='senior' order by lastName ;";  
    $teen = mysqli_query($db, $sql);
    $adult = mysqli_query($db, $sql1);
    $senior = mysqli_query($db, $sql2);

    if(!$teen && !$adult && !$senior)
        echo "\n<p class=\"error\"> No Data Found </p>".mysqli_error($db);
    else {
        if (isset($teen)) {
            echo "\n<div class=\"panel panel-primary\">";
            echo "\n<div class=\"panel-heading\">Teen</div>";
            echo "\n  <div class=\"panel-body\">";
            echo "\n<table class=\"table-bordered table-striped\">\n";
            echo "\n<tr><th>Image</th><th>Name</th><th>Age(Years)</th><th>Experience</th></tr>";
            while($row=mysqli_fetch_row($teen)) {
                echo "\n<tr>";
                echo "\n<td><img class=\"img-style img-responsive\" src=\"$row[0]\" alt=\"icon\" />";
                echo "\n<td><p>$row[1]</p></td>";
                echo "\n<td><p>$row[2]</p></td>";
                echo "\n<td><p>$row[3]</p></td>";
                echo "\n</tr>\n";
                }
                echo "\n</table></div></div>";
            }
        if (isset($adult)) {
            echo "\n<div class=\"panel panel-primary\">";
            echo "\n<div class=\"panel-heading\">Adults</div>";
            echo "\n  <div class=\"panel-body\">";
            echo "\n<table class=\"table-bordered table-striped\">\n";
            echo "\n<tr><th>Image</th><th>Name</th><th>Age</th><th>Experience</th></tr>";
            while($row=mysqli_fetch_row($adult)) {
                echo "\n<tr>";
                echo "\n<td><img class=\"img-style img-responsive\" src=\"$row[0]\" alt=\"icon\" />";
                echo "\n<td><p>$row[1]</p></td>";
                echo "\n<td><p>$row[2]</p></td>";
                echo "\n<td><p>$row[3]</p></td>";
                echo "\n</tr>\n";
                }
                echo "\n</table></div></div>";
            }
            if (isset($senior)) {
                echo "\n<div class=\"panel panel-primary\">";
                echo "\n<div class=\"panel-heading\">Senior</div>";
                echo "\n  <div class=\"panel-body\">";
                echo "\n<table class=\"table-bordered table-striped\">\n";
                echo "\n<tr><th>Image</th><th>Name</th><th>Age</th><th>Experience</th></tr>";
                while($row=mysqli_fetch_row($senior)) {
                    echo "\n<tr>";
                    echo "\n<td><img class=\"img-style img-responsive\" src=\"$row[0]\" alt=\"icon\" />";
                    echo "\n<td><p>$row[1]</p></td>";
                    echo "\n<td><p>$row[2]</p></td>";
                    echo "\n<td><p>$row[3]</p></td>";
                    echo "\n</tr>\n";
                    }
                    echo "\n</table></div></div>";
                }
    }
    mysqli_close($db);
    }
?>
</div>
</div>
</body>
</html>
