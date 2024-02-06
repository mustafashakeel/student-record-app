<?php

require_once('config.php');
//  This if Condition is important to check if the form is submitted or not 
// because we want to Insert the form into the database on Submit  and on Load 


// echo $_SERVER['PHP_SELF'] . "<br>";
// echo $_SERVER['REQUEST_METHOD'] . "<br>";
// echo $_SERVER['REQUEST_URI'] . "<br>";
// echo $_SERVER['GATEWAY_INTERFACE'] . "<br>";
// echo $_SERVER['REQUEST_TIME'] . "<br>";



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $name = $courses = $email = $details = "";
    $nameError= $courseError = $emailError = $detailsError = "";


    //  Capture the Info from the Form from Method POST  

    //  empty() function checks if the variable is empty or not
    // isset() function checks if the variable is set or not
    // trim() function removes the white spaces from the string

    // Steps
    // Step 1 : use Trim on Each Item to remove the white spaces

    // USE THE trim function trim($_POST['name']);
    // step 2: check if the variable is empty or not if Empty then set the error message else set the variable


    $name_input = trim($_POST['name']);
    $course_input = trim($_POST['courses']);
    $email_input = trim($_POST['email']);
    $details_input = trim($_POST['details']);

    // Validate the Name
    if(empty($name_input)){
        $nameError = "Please Enter a Valid Name ";
    }else {
        $name = $name_input;    
    }

    // Validate the Courses
    if(empty($course_input)){
        $courseError = "Please Enter a Valid Course ";
    }else {
        $courses = $course_input;

    }
    // Validate the Email 
    if(empty($email_input)){
        $emailError = "Please Enter a Valid Email ";
    }else {
        $email = $email_input;

    }

    // Validate the Details
    if(empty($details_input)){
        $detailsError = "Please Enter a Valid Details ";
    }else { 
        $details = $details_input;

    }






    echo "We have the following info from our form " .  $name . " " . $courses . " " . $email . " " . $details;

    if(empty($nameError) && empty($courseError) && empty($emailError) && empty($detailsError)){
        $sql = "INSERT INTO  students (name, courses, email, details) values ('$name', '$courses', '$email', '$details')";

        echo "My Insert SQL Query " . $sql;
        if ($db->query($sql) == TRUE) {
            // echo "New Record Created Successfully";
            // Redirect to the index.php page on Success
            header('Location: index.php');
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
        $db->close();
        
    }
   



    // echo "Form Submitted";
} else {
    // echo "Form Not Submitted";
}




?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vanarts Students Records Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2> Vanarts Add Records </h2>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="name">Name :</label>
                <input type="text" class="form-control <?php echo (!empty($nameError)) ?'is-invalid':''; ?>" id="name" name="name"
                 value="<?php echo $name; ?>" >
                <span class="invalid-feedback">
                    <?php echo $nameError; ?>
                </span>
            </div>
            <div class="form-group">
                <label for="courses"> Courses :</label>
                <input type="text" class="form-control <?php echo (!empty($courseError)) ?'is-invalid':''; ?>" id="courses" name="courses" value="<?php echo $courses ?>">
                <span class="invalid-feedback">
                    <?php echo $courseError; ?>
                </span>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="text" class="form-control <?php echo (!empty($emailError)) ?'is-invalid':''; ?>" id="email" name="email" value="<?php echo $email?>">
                <span class="invalid-feedback">
                    <?php echo $emailError; ?>
                </span>
            </div>
            <div class="form-group">
                <label for="details">Details : </label>

                <input type="text" class="form-control <?php echo (!empty($detailsError)) ?'is-invalid':''; ?>" id="details" name="details" value="<?php echo $details ?>">
                <span class="invalid-feedback">
                    <?php echo $detailsError; ?>
                </span>
            </div>
            <div class="form-group">

                <input type="submit" class="btn btn-primary form-control" value="Submit">
            </div>
        </form>


    </div>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>