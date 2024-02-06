<?php 
require_once 'config.php';
// Collect the ID after the Form Submission which is a Yes button from the hidden field 

if(isset($_POST['id']) && !empty($_POST['id'])){
    $id= $_POST['id'];

    //echo "Form is Submitted and ID is ".$id;
    // Write the SQL to delete the record from the database
    $sql = "delete from students where id = $id";
    if($result = mysqli_query($db, $sql) == TRUE){
        echo "Record Deleted Successfully";
        // Redirect to the index.php page on Success
        header('Location: index.php');

    }else{
        echo "Error: " . $sql . "<br>" . $db->error;
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <h2> Delete Record </h2>
        </div>

        <div class="alert alert-danger" role="alert">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

        <input type="hidden" value="<?php if(isset($_GET['id'])) echo $_GET['id']; ?>"  name="id" > 
        <input type="submit" value="Yes" class="btn btn-danger">
        <a href="index.php" class="btn btn-secondary">No</a>

        
        </form>
        </div>

    </div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>