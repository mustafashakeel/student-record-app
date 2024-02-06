<?php

$name = "John";
$age = 25;
$logged = true;
$students = array("John", "Mary", "Bob");
$students2 = ["John", "Mary", "Bob"];
$school = ['name' => 'Vanarts', 'location' => 'Vancouver', 'students' => 100];
$week = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];



// MultiDementional Array
$studentMA = [['name' => 'John', 'age' => 25], ['name' => 'Mary', 'age' => 30], ['name' => 'Bob', 'age' => 35]];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script>
        // multidimentional object; 
        var classes = [{
            name: 'John',
            age: 25
        }, {
            name: 'Mary',
            age: 30
        }, {
            name: 'Bob',
            age: 35
        }];
    </script>

    <h1><?php echo $name ?></h1>
    <h2>Array 1 <?php echo $students[1]; ?></h2>
    <h2>Array 2 <?php echo $students2[2]; ?></h2>
    <h2>Associative Array : <?php echo $school['name']; ?></h2>

    <h2>For Loop</h2>
    <ul><?php
        for ($i = 0; $i < count($week); $i++) {
            echo "<li>" . $week[$i] . "</li>";
        }
        ?>

    </ul>
    <h2>MultiDimentional Array </h2>
    <h2>
        name: <?php echo $studentMA[0]['name']; ?>
        Loop
        <ul>
            <?php
            foreach ($studentMA as $student) {
                echo "<li>" . $student['name'] . "</li>";
            }

            ?>
        </ul>

    </h2>
    <h2>Additional loop </h2>
    <?php
    foreach ($school as $student => $value) {
        echo "<h2>Student Key : " . $student . "  my array  Value  " . $value . "</h2>";
    }
    ?>




</body>

</html>