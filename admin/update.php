<?php
// Include config file
require_once "connection.php";
 
// Define variables and initialize with empty values
$title1 = $title2 = $title3 = "";
$title1_err = $title2_err = $title3_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $title1 = trim($_POST["title1"]);
    if(empty($title1)){
        $title_err = "Please enter a Title.";
    } elseif(!filter_var($title1, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $title1_err = "Please enter a valid Title.";
    } else{
        $title1 = $title1;
    }
    
    // Validate Title 2
    $title2 = trim($_POST["title2"]);
    if(empty($title2)){
        $title2_err = "Please enter Title 2.";     
    } else{
        $title2 = $title2;
    }
    
    // Validate Title 3
    $title3 = trim($_POST["title3"]);
    if(empty($title3)){
        $salary_err = "Please enter Title 3.";     
    } elseif(!ctype_digit($title3)){
        $title3_err = "Please enter Title 3.";
    } else{
        $title3= $title3;
    }
    
    // Check input errors before inserting in database
    if(empty($title1_err) && empty($title2_err) && empty($title3_err)){
        // Prepare an update statement
        $sql = "UPDATE table_1 SET title1=?, title2=?, title3=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_title1, $param_title2, $param_title3, $param_id);
            
            // Set parameters
            $param_title1 = $title1;
            $param_title2 = $title2;
            $param_title3 = $title3;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM table_1 WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $title1 = $row["title1"];
                    $title2 = $row["title2"];
                    $title3 = $row["title3"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update Task record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>