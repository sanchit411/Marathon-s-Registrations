<?php

$bad_chars = array('$','%','?','<','>','php');

function check_post_only() {
if(!$_POST) {

    write_error_page("This scripts can only be called from a form.");
    exit;
    }
}

function write_error_page($msg) {
    write_header();
    echo "<h4>Sorry, an error occurred<br />",
    $msg,"</h4>";
    write_footer();
    }
    
function write_header() {
print <<<ENDBLOCK
<!doctype html>
<html>
        <head>
                <!--   meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
                <link rel="stylesheet" href="bootstrap/css/jquery-ui.css">
                <!-- Optional JavaScript -->
                <!-- CSS -->
                <link rel="stylesheet" href="mystyle.css" >
                
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="jquery/jquery.js"></script>
                
                <script src="jquery/jquery-ui.js"></script>
                <script src="main.js"></script>
                <script src="bootstrap/js/bootstrap.min.js" ></script>      
        </head>
<body>
    <div id="body" class="container">
        <h1>SDSU Registration&apos;s 2017</h1>
    <div class="error">    
ENDBLOCK;
}

function write_footer() {
    echo "</body></html>";
    }
    
function get_db_handle() {
    ########################################################
    # DO NOT USE jadrn000, DO NOT MODIFY jadnr000 DATABASE!
    ########################################################            
    $server = 'opatija.sdsu.edu:3306';
    $user = 'jadrn003';
    $password = 'potato';
    $database = 'jadrn003';   
    ########################################################
        
    if(!($db = mysqli_connect($server, $user, $password, $database))) {
        write_error_page('SQL ERROR: Connection failed: '.mysqli_error($db));
        }
    return $db;
    }        
       
function close_connector($db) {
    mysqli_close($db);
    }
    
?>
