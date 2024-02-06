<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Submitted page</h2>
    <?php
    $name = $_POST['name'];
    $age = $_POST['age'];

    ?>
    <h1>Thanks for submiting the form, </h1>
    <h2>Your Name is : <?php echo $name; ?></h2>
    <h2>Your Age is : <?php echo $age; ?></h2>

</body>

</html>