
// Sanchit ARora
// RedID : 820883616 
// Account : jadrn003   


 // Verify Email
$(document).ready(function() {
    $('input[name="name"]').focus();
    
    $("input#emailAdd").blur(function(e) {;
        e.preventDefault();
        var params = "email="+$('#emailAdd').val();
        var url = "check_dup.php?"+params;
        $.get(url, dup_handler);
        });
    
    });
    
function dup_handler(response) {
    if(response == "dup")
        $('#errorEmail').text("ERROR, duplicate");
    else if(response == "OK") {
        $('#errorEmail').text("");
        $('form').serialize();
        //$('form').submit();
        }
    else
        alert(response);
    }
   
   //Validate Form
   function validateForm() {
   
       //Validate Image 
       if(document.getElementById("image_text").value != "") {
      document.getElementById("errorImage").innerHTML = "";
       }
       else {
           document.body.scrollTop = document.documentElement.scrollTop = 0;
           document.getElementById("errorImage").style.display = "block";
           document.getElementById("errorImage").innerHTML = "Please select an image!";
           return false;
       }
   
       // First Name
       var getFirstName = document.getElementById('firstName').value.trim();
       if (getFirstName == "" || getFirstName.length == 0)
       {
           document.getElementById("firstName").focus();
           document.getElementById("errorFName").style.display = "block";
           document.getElementById("errorFName").innerHTML = "Please Enter the First Name!";
           return false;
       }
       else
       {
           document.getElementById("errorFName").style.display = "none";
       }
   
       //Last Name
       var getLastName = document.getElementById('lastName').value.trim();
       if (getLastName == "" || getLastName.length == 0)
       {
           document.getElementById("lastName").focus();
           document.getElementById("errorLName").style.display = "block";
           document.getElementById("errorLName").innerHTML = "Please Enter the Last Name!";
           return false;
       }
       else
       {
           document.getElementById("errorLName").style.display = "none";   
       }
   
       //Address1
       var getAddress1 = document.getElementById("adr1").value.trim();
       if (getAddress1 == "" || getAddress1.length == 0 || getAddress1.length < 2)
       {
           document.getElementById("adr1").focus();
           document.getElementById("errorAdr1").style.display = "block";
           document.getElementById("errorAdr1").innerHTML = "Please Enter the Address!";
           return false;
       }
       else{
        document.getElementById("errorAdr1").style.display = "none"; 
       }
   
       // State
        var state = document.getElementById("state").value;
       if (state == "") {
           document.getElementById("state").focus();
           document.getElementById("errorAdrDetails").style.display = "block";
           document.getElementById("errorAdrDetails").innerHTML = "Please select a state!";
           return false;
       }
   
       //City
       var city = document.getElementById("city").value.trim();
   
       if (city.length < 2) {
           document.getElementById("city").focus();
           document.getElementById("errorAdrDetails").style.display = "block";
           document.getElementById("errorAdrDetails").innerHTML = "Please enter a city!";
           return false;
       }
   
   
       //Zip
       var zip = document.getElementById("zip").value.trim();
       if (zip == "" || zip.length != 5)
       {
           document.getElementById("zip").focus();
           document.getElementById("errorAdrDetails").style.display = "block";
           document.getElementById("errorAdrDetails").innerHTML = "Please Enter the Valid Zip! Exactly 5 digits!";
           return false;
       }
       
           var regexName=/^\d{5}$|^\d{5}-\d{4}$/;
           if(regexName.test(document.getElementById("zip").value))
           {
               document.getElementById("errorAdrDetails").style.display = "none";     
           }
           else
           {
               document.getElementById("zip").focus();
               document.getElementById("errorAdrDetails").style.display = "block";
               document.getElementById("errorAdrDetails").innerHTML = "Please Enter the Valid Zip! Only numbers allowed!";
               return false;
           }   
       
   
       // Phone Number
       var phone = document.getElementById("phone").value.trim();
       if (phone == "" || phone.length != 10)
       {
           document.getElementById("phone").focus();
           document.getElementById("errorPhone").style.display = "block";
           document.getElementById("errorPhone").innerHTML = "Please Enter the valid Phone!";
           return false;
       }
       else if (phone.length != 10) {
           document.getElementById("phone").focus();
           document.getElementById("errorPhone").style.display = "block";
           document.getElementById("errorPhone").innerHTML = "Please Enter the Valid Phone! Exactly 10 digits!";
           return false;
       }
       else
       {
           var regexName=/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
           if(regexName.test(document.getElementById("phone").value))
           {
               document.getElementById("errorPhone").style.display = "none";  
                 
           }
           else
           {
               document.getElementById("phone").focus();
               document.getElementById("errorPhone").style.display = "block";
               document.getElementById("errorPhone").innerHTML = "Please Enter the Valid Phone! Only numbers allowed!";
               return false;
           }   
       }
   
       //Email Address
       var email = document.getElementById("emailAdd").value.trim();
       if (email.length == 0)
       {
           document.getElementById("emailAdd").focus();
           document.getElementById("errorEmail").style.display = "block";
           document.getElementById("errorEmail").innerHTML = "Please Enter the Email!";
           return false;
       }
      
           var regexName = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
           if(regexName.test(document.getElementById("emailAdd").value))
           {
               document.getElementById("errorEmail").style.display = "none";  
           }
           else
           {
               document.getElementById("emailAdd").focus();
               document.getElementById("errorEmail").style.display = "block";
               document.getElementById("errorEmail").innerHTML = "Please Enter the Valid Email!";
               return false;
           } 
    
   
       
   
       // Date of Birth

       var dob = document.getElementById("date").value;
       if (typeof dob === 'undefined' || dob == "")  {
        document.getElementById("errorDOB").style.display = "block";
        document.getElementById("errorDOB").innerHTML = "Please Enter the Date of Birth!"
        return false;
       }
       else if (!dateRangeValidation(document.getElementById("date"))){
        document.getElementById("errorDOB").style.display = "block";
        document.getElementById("errorDOB").innerHTML = "Date of birth must be within range (12/04/1917 to 12/02/2003) ";
        return false;
       }
       else {
        document.getElementById("errorDOB").style.display="none";
       }
       
       return true;
   
   }

   function readURL(input) {
    
        if (input.files && input.files[0]) {
             var reader = new FileReader();
    
             reader.onload = function (e) {
                 $('#prof_img').attr('src', e.target.result);
             };
            
             if ((input.files[0].size)/1000 > 1024) {
                 document.getElementById("errorImage").style.display = "block";
                 document.getElementById("errorImage").innerHTML = "Max size allowed is 1 MB!";
                 return false;
             }
             else {
                 document.getElementById("errorImage").style.display = "none";
                  reader.readAsDataURL(input.files[0]);
             }
         }
        }

        function dateRangeValidation(date) {
            dob = new Date(date.value),
            pickedDate   = dob.getTime(),
            min   = new Date('12/04/1917').getTime(),
            max  = new Date('12/02/2003').getTime();
         
            if (pickedDate >= min && pickedDate < max) {
              return true;
          }else{
              return false;
          }
         }
