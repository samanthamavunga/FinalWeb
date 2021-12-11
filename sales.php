<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$Productname = $Revenue = $Onlinepurchases = $WalkInPurchases = "";
$Productname_err = $Revenue_err = $Onlinepurchases_err = $WalkInPurchases_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    // Validate product
    $input_name = trim($_POST["Productname"]);
    if(empty($input_name)){
        $Productname_err = "Please enter a product.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $Productname_err = "Please enter a valid product.";
    } else{
        $Productname = $input_name;
    }
    
    // Validate revenue
    $input_revenue = trim($_POST["Revenue"]);
    if(empty($input_revenue)){
        $Revenue_err = "Please enter the revenue.";     
    } else{
        $Revenue = $input_revenue;
    }
    
    // Validate online purchases
    $input_online = trim($_POST["Onlinepurchases"]);
    if(empty($input_online)){
        $Onlinepurchases_err = "Please enter the quantity of online purchases.";     
    } elseif(!ctype_digit($input_online)){
        $Onlinepurchases_err = "Please enter a positive integer value.";
    } else{
        $Onlinepurchases = $input_online;
    }
    
// Validate walkin purchases
 $input_walkin = trim($_POST["WalkInPurchases"]);
 if(empty($input_walkin)){
    $WalkInPurchases_err = "Please enter the quantity of walkin purchases.";     
 } elseif(!ctype_digit($input_online)){
    $WalkInPurchases_err = "Please enter a positive integer value.";
 } else{
    $WalkInPurchases = $input_online;
 }



    // Check input errors before inserting in database
    if(empty($Productname_err) && empty($Revenue_err) && empty($Onlinepurchases_err) && empty($WalkInPuchases_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO Sales (Productname, Revenue, Onlinepurchases, WalkInPurchases) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_Productname, $param_Revenue, $param_Onlinepurchases, $param_WalkInPurchases);
            
            // Set parameters
            $param_Productname = $Productname;
            $param_Revenue = $Revenue;
            $param_Onlinepurchases = $Onlinepurchases;
            $param_WalkInPurchases = $WalkInPurchases;

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to set sales record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($Productname_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $Productname; ?>">
                            <span class="help-block"><?php echo $Productname_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Revenue_err)) ? 'has-error' : ''; ?>">
                            <label>Revenue</label>
                            <textarea name="revenue" class="form-control"><?php echo $Revenue; ?></textarea>
                            <span class="help-block"><?php echo $Revenue_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Onlinepurchases_err)) ? 'has-error' : ''; ?>">
                            <label>Online</label>
                            <input type="text" name="online" class="form-control" value="<?php echo $Onlinepurchases; ?>">
                            <span class="help-block"><?php echo $Onlinepurchases_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index_sales.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>