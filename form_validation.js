function validateform()  
    {  
        var name=document.myform.name.value;  //assign the text input from the "username" text filed to a variable
        var password=document.myform.password.value;  //assign the text input from the "password" text filed to a variable
          
        if (name==null || name==""){ 
            //Check the if the field is blank or empty and alert the user of the error
          alert("Name can't be blank");  
          return false;  
        }else if(password.length<3){  
            //Check the if the password value is of the required length and alert the user of the error
          alert("Password must be at least 6 characters long.");  
          return false;  
          } 
          else{
            if(name== 'CEO' && password== '1234' ){
                //Check the  if the password and username is valid 
                setTimeout(function() {window.location = "index.php" });
                //Redirect the user to the "database view page"
            }
            else if(name== 'MD' && password== '1234' ){
                //Check the  if the password and username is valid 
                setTimeout(function() {window.location = "index.php" });
                //Redirect the user to the "database view page"
            }else if(name== 'Other' && password== '1234' ){
                //Check the  if the password and username is valid 
                setTimeout(function() {window.location = "index.php" });
                //Redirect the user to the "database view page"
            } else{
                alert("Access denied. Valid username and password is required.");
                 //Alert the user of the invalid credential"
            }
          return true;
          }
     
        }
     
     