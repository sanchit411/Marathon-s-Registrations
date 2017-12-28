
 

<?php

$pass = $_POST['pass'];
$valid = false;

$raw = file_get_contents('passwords.dat');
$data = explode("\n",$raw);
foreach($data as $item) {
    if( crypt($pass,$item) === $item) 
            $valid = true;            
    }  #end foreach
   
if($valid) {
 include('show_report.php');
}
else
include('error.php');   
?>
