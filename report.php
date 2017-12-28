

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Log In </title>
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
  <script type="text/javascript">
if(!navigator.cookieEnabled) {
	alert("Cookies are disabled in your browser. " +
	      "You must enable cookies to use this application.");
	}  
</script> 
</head>
<body>
<div class="container">
  <div class="jumbotron">
<h2>Please Enter Password</h2>

<div class="form-group">

<form method="post" 
      action="process_login.php"
      name="login">
<div class="form-group row">

<div class="col-12">
 <input class ="form-control"type="password" name="pass" /><br />
 </div>
 </div>
 <div class="form-group row">
 <div class="col-12">	 
<input type="reset" class="btn btn-warning" value="Clear" />
<input type="submit" class="btn btn-primary" value="Log In" />
</div></div>
</form>

</div>
</div>
</div>
<script type="text/javascript">
document.login.pass.focus();
</script>
</body>
</html>
