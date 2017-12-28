<?php
$age = 0;
$image = "";
function validate_data($params) {
    $msg = "";
    if(strlen($params[15]) == 0)
    $msg .= "Please upload file<br />";
    if(strlen($params[0]) == 0)
        $msg .= "Please enter the First Name<br />";  
    if(strlen($params[2]) == 0)
        $msg .= "Please enter the Last Name <br />"; 
    if(strlen($params[3]) < 2)
        $msg .= "Please Enter the Address!<br />"; 
    if(strlen($params[5]) == 0)
        $msg .= "Please enter the state<br />";  
    if(strlen($params[6]) == 0)
        $msg .= "Please enter the city<br />";                       
    if(strlen($params[7]) == 0)
        $msg .= "Please enter the zip code<br />";
    elseif(!is_numeric($params[7])) 
        $msg .= "Zip code may contain only numeric digits<br />";
    elseif(strlen($params[7]) != 5)
        $msg .= "Enter only 5 digits<br />";
    if(strlen($params[8]) != 10)
        $msg .= "Please enter the Phone Number and enter 10  digits only <br />";
    elseif(!is_numeric($params[8])) 
        $msg .= "Phone Number should be numeric only<br />";
    if(strlen($params[9]) == 0)
        $msg .= "Please enter email<br />";
    elseif(!filter_var($params[9], FILTER_VALIDATE_EMAIL))
        $msg .= "Your email appears to be invalid<br/>";
    $msg .= date_validation($params[11]);

        
    if($msg) {
        write_form_error_page($msg);
        exit;
        }
    }
// Used this link https://stackoverflow.com/questions/12030810/php-date-validation
function date_validation($param)  {
    global $age;
    if(!isset($param))
        return "Please enter the date <br />";

    $year = substr($param,0,4);

    if (intval($year) > 2003 || intval($year) < 1917) {
        return "Date of birth must be within range (12/04/1917 to 12/02/2003)<br />";
    }
    else {
        $age = 2017 - intval($year);
    }
 
}
  
function write_form_error_page($msg) {
    write_header();
    echo "<h4>Sorry, an error occurred<br />",
    $msg,"</h4>";
    write_form();
    write_footer();
    }  
    
function write_form() {
    print <<<ENDBLOCK
    </div>
	<form name="register" class="form-horizontal" id="contactform" enctype="multipart/form-data" action="process_request.php" method="post" onsubmit="return validateForm()">
    <div class="row">
        <div class="col-sm-7 ">
            <img id="prof_img" src="placeholder.jpg" alt="img_person"  class=" img-size img-responsive">
        </div>
        <div id="errorIm" class="col-sm-5"></div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <input type='file' id='image_text' name='image' value="$_FILES[image][name])" accept='image/*'  onchange="readURL(this)"  /> 
        </div>
        <div id="errorImage" class="col-sm-4 error"></div>
    </div>
<div class="form-group">
    <label class="control-label col-sm-2" for="firstName">First Name:</label>
    <div class="col-sm-7">
       <input type="text" class="form-control" id="firstName" name="firstName value="$_POST[firstName]" placeholder="First Name"  >
    </div>
    <div id="errorFName" class="col-sm-3 error"></div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="middleName">Middle Name:</label>
    <div class="col-sm-7">
       <input type="text" class="form-control" id="middleName" name="middleName" value="$_POST[middleName]" placeholder="Middle Name(Optional)">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="lastName">Last Name:</label>
    <div class="col-sm-7">
       <input type="text" class="form-control" id="lastName" name="lastName" value="$_POST[lastName]" placeholder="Last Name"  >
    </div>
    <div id="errorLName" class="col-sm-3 error"></div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="adr1">Address 1:</label>
    <div class="col-sm-7"> 
        <input type="text" class="form-control" id="adr1" name="address1" value="$_POST[address1]" placeholder="Address 1"  >
    </div>
    <div id="errorAdr1" class="col-sm-3 error"></div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="adr2">Address 2:</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="adr2" name="address2" value="$_POST[address2]" placeholder="Address 2(Optional)">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="adr-details">Address Details:</label>
    <div class="col-sm-3">
        <select class="form-control" id="state" name="state" value="$_POST[state]" >
            <option value="">Select a State</option>
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            <option value="AZ">Arizona</option>
            <option value="AR">Arkansas</option>
            <option value="CA" selected="selected">California</option>
            <option value="CO">Colorado</option>
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="DC">District Of Columbia</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">Hawaii</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="IN">Indiana</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="MT">Montana</option>
            <option value="NE">Nebraska</option>
            <option value="NV">Nevada</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NM">New Mexico</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="ND">North Dakota</option>
            <option value="OH">Ohio</option>
            <option value="OK">Oklahoma</option>
            <option value="OR">Oregon</option>
            <option value="PA">Pennsylvania</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="SD">South Dakota</option>
            <option value="TN">Tennessee</option>
            <option value="TX">Texas</option>
            <option value="UT">Utah</option>
            <option value="VT">Vermont</option>
            <option value="VA">Virginia</option>
            <option value="WA">Washington</option>
            <option value="WV">West Virginia</option>
            <option value="WI">Wisconsin</option>
            <option value="WY">Wyoming</option>
        </select> 
    </div>
    <div class="col-sm-2">
        <input type="text" class="form-control" id="city" name="city" value="$_POST[city]" placeholder="City"   >
    </div>
    <div class="col-sm-2">
        <input type="text" class="form-control" id="zip" name="zip" value="$_POST[zip]" placeholder="Zip"   >
    </div>
    <div id="errorAdrDetails" class="col-sm-3 error"></div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="phone">Primary Phone:</label>
    <div class="col-sm-2">
        <input type="text" class="form-control" id="phone" name="phone" maxlength="10" value="$_POST[phone]" placeholder="1234567890"  >
    </div>
    <div id="errorPhone" class="col-sm-8 error"></div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="emailAdd">Email:</label>
    <div class="col-sm-7">
        <input type="email" class="form-control" id="emailAdd" name="email" value="$_POST[email]" placeholder="someone@abc.com"   >
    </div>
    <div id="errorEmail" class="col-sm-3 error"></div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="gender">Gender:</label>
    <div class="col-sm-10 ">
        <label class="radio-inline">
            <input type="radio" name="gender" id="maleRadio" value="male" checked> Male
        </label>
        <label class="radio-inline">
            <input type="radio" name="gender" id="femaleRadio" value="female"> Female
        </label>
        <label class="radio-inline">
            <input type="radio" name="gender" id="othersRadio" value="others"> Others
        </label>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="datepicker">Date of Birth</label>
    <div class="col-sm-2">
            <input type="date"  name="birthdate" id="date" value="$_POST[birthdate]" placeholder="YYYYMMDD">
            
      
    </div>
    <div id="errorDOB" class="col-sm-8 error"></div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="medCond">Medical Condition:</label>
    <div class="col-sm-7">
        <textarea class="form-control" rows="3"  name="medCond" value="$_POST[medCond]" placeholder="Medical Condition"></textarea>
    </div>
 </div>
<div class="form-group">
    <label class="control-label col-sm-2" for="expLevel">Experience Level:</label>
    <div class="col-sm-7">
        <label class="radio-inline">
            <input type="radio" name="expLevel" id="expertRadio" value="expert"checked> Expert
        </label>
        <label class="radio-inline">
            <input type="radio" name="expLevel" id="experiencedRadio" value="experienced"> Experienced
        </label>
        <label class="radio-inline">
           <input type="radio" name="expLevel" id="noviceRadio" value="novice"> Novice
        </label>
    </div>
    <div id="errorExpLevel" class="col-sm-3 error"></div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="category">Category:</label>
    <div class="col-sm-7">
        <label class="radio-inline">
            <input type="radio" name="category" id="teenRadio" value="teen"checked> Teen
        </label>
        <label class="radio-inline">
            <input type="radio" name="category" id="adultRadio" value="adult"> Adult
        </label>
        <label class="radio-inline">
            <input type="radio" name="category" id="seniorRadio" value="senior"> Senior
        </label>
    </div>
</div>
<div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
        <input type="reset" class="btn btn-warning" value="Clear" />
        <button type="submit" class="btn btn-primary" name="submit" id="submit_form" >Submit</button>
    </div>
</div>
</form>
</div>
ENDBLOCK;
}                        

function process_parameters() {;
    global $bad_chars;
    $params = array();


    $params[] = trim(str_replace($bad_chars, "",$_POST['firstName']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['middleName']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['lastName']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['address1']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['address2']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['state']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['city']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['zip']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['phone']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['email']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['gender']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['birthdate']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['medCond']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['expLevel']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['category']));
    $params[] = trim(str_replace($bad_chars, "", $_FILES['image']['name']));
    return $params;
    }
    
function store_data_in_db($params) {
    global $image;
    global $age;
    $params[11] = (string)$age;
    $params[15] = $image;

    # get a database connection
    echo("db connection");
    $db = get_db_handle();  ## method in helpers.php
    ##############################################################
    $sql = "SELECT * FROM runner WHERE ".
    "email = '$params[9]';";
##echo "The SQL statement is ",$sql;    
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0) {
        write_form_error_page('This record appears to be a duplicate');
        exit;
        }
##OK, duplicate check passed, now insert
    $sql =  "INSERT INTO `runner` ( `firstName`, `middleName`, `lastName`, `address1`, `address2`, `state`, `city`, `zip`, `phone`, `email`, `gender`, `dob`, `medCond`, `expLevel`, `category`, `image_name`)".
    " VALUES('$params[0]','$params[1]','$params[2]','$params[3]','$params[4]','$params[5]', '$params[6]','$params[7]','$params[8]','$params[9]','$params[10]','$params[11]', '$params[12]','$params[13]','$params[14]','$params[15]');";
##echo "The SQL statement is ",$sql; 

    mysqli_query($db,$sql);
    $how_many = mysqli_affected_rows($db);
    close_connector($db);
    }
function file_upload(){
    global $image;
    $UPLOAD_DIR = 'images/';
    $COMPUTER_DIR = '/home/jadrn003/public_html/proj3/images/';
    $em = explode('@',$_POST['email']);
    $type = explode('/',$_FILES['image'][type]);
    $fname = $_POST['phone']._.$em[0].'.'. $type[1];
    $image =  $UPLOAD_DIR.$fname;

    if(file_exists("$UPLOAD_DIR".$fname))  {
        echo "<b>Error, the file $fname already exists on the server</b><br />\n";
        }
    elseif($_FILES['image']['error'] > 0) {
    	$err = $_FILES['image']['error'];	
        echo "Error Code: $err ";
	if($err == 1)
		echo "The file was too big to upload, the limit is 2MB<br />";
        } 
    elseif(exif_imagetype($_FILES['image']['tmp_name']) != IMAGETYPE_JPEG && exif_imagetype($_FILES['image']['tmp_name']) != IMAGETYPE_PNG) {
        echo "ERROR, not a jpg file or png file <br />";   
        }
## file is valid, copy from /tmp to your directory.        
    else { 
        move_uploaded_file($_FILES['image']['tmp_name'], "$UPLOAD_DIR".$fname);

    } 
 
   
}        
?>   
