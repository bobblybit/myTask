<?php
// Include config file
require_once "connection.php";
 
// Define variables and initialize with empty values
$title1 = $title2= $title3 = "";
$title1_err = $title2_err = $title3_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate title1
    $title1 = trim($_POST["title1"]);
    if(empty($title1)){
        $title1_err = "Please enter a Title.";
    } elseif(!filter_var($title1, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $title1_err = "Please enter a valid Title.";
    } else{
        $title1 = $title1;
    }
    
    // Validate Title2
    $title2 = trim($_POST["title2"]);
    if(empty($title2)){
        $title2_err = "Please enter title2.";     
    } else{
        $title2 = $title2;
    }
    
    // Validate salary
    $title3 = trim($_POST["title3"]);
    if(empty($title3)){
        $title3_err = "Please enter Title3.";     
    } elseif(!ctype_digit($title3)){
        $title3_err = "Please enter Title 3.";
    } else{
        $title3 = $title3;
    }
    
    // Check input errors before inserting in database
    if(empty($title1_err) && empty($title2_err) && empty($title3_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO task_tb (title1, title2, title3) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_title1, $param_title2, $param_title3);
            
            // Set parameters
            $param_title1 = $title1;
            $param_title2 = $title2;
            $param_title3 = $title3;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
         // mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Title 1</label>
                            <input type="text" name="title1" class="form-control <?php echo (!empty($title1_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $title1; ?>">
                            <span class="invalid-feedback"><?php echo $title1_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Title 2</label>
                            <textarea name="title2" class="form-control <?php echo (!empty($title2_err)) ? 'is-invalid' : ''; ?>"><?php echo $title2; ?></textarea>
                            <span class="invalid-feedback"><?php echo $title2_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Title 3</label>
                            <input type="text" name="title3" class="form-control <?php echo (!empty($title3_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $title3; ?>">
                            <span class="invalid-feedback"><?php echo $title3_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>