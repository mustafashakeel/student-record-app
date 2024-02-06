<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vanarts Students Records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <h2> Vanarts Student Records </h2>
        <a class="btn btn-primary" href="create.php">Create</a>
        <?php
        // Call in the config file which has our connection
        require_once 'config.php';
        //  Write the SQL which will get all the info from our studebt table
        $sql = "select * from students";


        // Run the query and store the result in a variable $result

        if ($result = mysqli_query($db, $sql)) {
            // echo var_dump($result);
            // Check if there are any records in the result
            if (mysqli_num_rows($result) > 0) {

                // write the table header
                echo   '<table class="table table-striped">';
                echo   '<thead>';
                echo   '<tr>';
                echo   '<th scope="col">ID</th>';
                echo   '<th scope="col">Name</th>';
                echo   '<th scope="col">Email</th>';
                echo   '<th scope="col">Courses</th>';
                echo   '<th scope="col">Details</th>';
                echo   '<th scope="col">Actions</th>';
                echo   '</tr>';
                echo   '</thead>';
                echo   '<tbody>';

                // Loop through the records and display them in the table Rows

                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                    echo '<th scope="row">' . $row['id'] . '</th>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['courses'] . '</td>';
                    echo '<td>' . $row['details'] . '</td>';
                    echo '<td> <a href="view.php?id=' . $row['id'] . '"><i class="fa-regular fa-eye"></i></a> <a href="update.php?id=' . $row['id'] . '"><i class="fa-solid fa-pen-to-square"></i></a> <a href="delete.php?id=' . $row['id'] . '"><i class="fa-solid fa-trash"></i></a> </td>';

                    echo  '</tr>';
                }
                echo   '</tbody>';
                echo   '</table>';
            } else {
                echo "No records found";
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }




        ?>

        <!-- <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Courses</th>
                    <th scope="col">Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>


                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>@mdo</td>

                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>@mdo</td>

                </tr>
            </tbody>
        </table> -->

    </div>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>