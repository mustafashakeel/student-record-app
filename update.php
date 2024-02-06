<?php 

// Include the Config File
require_once "config.php";

//  Collect the ID from the URL / Link 


// Check if the form is submitted or not using POST method

if(isset($_POST['id']) && !empty($_POST['id'])){
    // echo "Form is Submitted";
    // Collect the Form Info 

    $id = $_POST['id'];
    $name = $_POST['name'];
    $courses = $_POST['courses'];
    $email = $_POST['email'];
    $details = $_POST['details'];

    // Write the SQL which will update the record in the database
    $update_sql = "update students set name = '$name', courses = '$courses', email = '$email', details = '$details' where id = $id";
    if($result = mysqli_query($db, $update_sql) === TRUE) {
        echo "Record Updated Successfully";
        header('Location: index.php');
    }else{
        echo "Error: " . $update_sql . "<br>" . $db->error;
    }









}else{
    if(isset($_GET['id']) && !empty($_GET['id'])){

        $id = $_GET['id'];
        echo " MY ID ". $id;
    
    
        // Write the SQL which will get all the info from our studebt table
    
        $sql = "select * from students where id = $id";
     
        if($result = mysqli_query($db, $sql)){
            // echo var_dump($result);
            // Check if there are any records in the result
            if(mysqli_num_rows($result) > 0){
                // Loop through the records and display them in the table Rows
                while($row = mysqli_fetch_array($result)){
                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $courses = $row['courses'];
                    $details = $row['details'];
                }
            }else{
                echo "No records found";
            }
        }
}




    // echo "We have the following info from our form " .  $name . " " . $courses . " " . $email . " " . $details;

    // Execute it 



}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>


    <div class="wrapper">
        <div class="container-fluid" style="background:beige;">
            <div class="header">
                <h2 style="text-align:center;">Update Student Record</h2>
            </div>
            
        <div>
            <div class="col-6 container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="name" placeholder="Enter name" value="<?php echo $name; ?>">
                <small id="nameHelp" class="form-text text-muted">Update the Student name here  .</small>
            </div>
            <div class="form-group">
                <label for="courses">Courses</label>
                <input type="text" class="form-control" id="courses" name="courses" aria-describedby="coursesHelp" placeholder="Enter Courses" value="<?php echo $courses; ?>">
                <small id="coursesHelp" class="form-text text-muted">Update the courses here .</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $email; ?>">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="details">Details</label>
                <input type="text" class="form-control" id="details" name="details" aria-describedby="detailsHelp" placeholder="Enter Courses" value="<?php echo $details; ?>">
                <small id="detailsHelp" class="form-text text-muted">Update the Details here .</small>
            </div>
            <input type="hidden" name="id" value="<?php echo $id;?>">

         <button type="submit" class="btn btn-primary">Submit</button>
        </form>

            </div>
       
        </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


