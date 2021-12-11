<?php 
require_once "config.php";


if(isset($_GET['search'])) {

$search = $_GET['search'];
//$search = mysqli_real_escape_string($search);

$query = "SELECT * FROM employees WHERE name LIKE '%".$search."%'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 1){
    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    // Retrieve individual field value
    $name = $row["name"];
    $address = $row["address"];
    $salary = $row["salary"];
}
}
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="wrapper">
   <div class="container-fluid">
       <div class="row">
           <div class="col-md-12">
               <div class="page-header">
                   <h1>View Record</h1>
               </div>
               <div class="form-group">
                   <label>Name</label>
                   <p class="form-control-static"><?php echo $row["name"]; ?></p>
               </div>
               <div class="form-group">
                   <label>Address</label>
                   <p class="form-control-static"><?php echo $row["address"]; ?></p>
               </div>
               <div class="form-group">
                   <label>Salary</label>
                   <p class="form-control-static"><?php echo $row["salary"]; ?></p>
               </div>
               <p><a href="index.php" class="btn btn-primary">Back</a></p>
           </div>
       </div>        
   </div>
</div>

</body>
</html>