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
        $name = $time = $date = $game = $category = $glitch = $video = "";
        $nameError = $timeError = $dateError = $gameError = $categoryError = $glitchError = $videoError = "";
        //  Capture the Info from the Form from Method POST
        // empty() function checks if variable is set or not
        // trim() function removes white spaces from string
        $name_input = trim($_POST['name']);
        $time_input = trim($_POST['time']);
        $date_input = trim($_POST['date']);
        $game_input = trim($_POST['game']);
        $category_input = $_POST['category'];
        $glitch_input = $_POST['glitch'];
        $video_input = trim($_POST['video']);

        if(!isset($_POST['category'])){
            $categoryError = "please select a valid Category";

        }else {
            $category = $category_input;
        }
        if(!isset($_POST['glitch'])){
            $glitchError = "please select a valid Category";

        }else {
            $glitch = $glitch_input;
        }
        // name
        if(empty($name_input)){
            $nameError = "Please enter a valid name";
        }
        else{
            $name = $name_input;
        }
        // time
        if(empty($time_input)){
            $timeError = "Please enter a valid time";
        }
        else{
            $time = $time_input;
        }
        // date
        if(empty($date_input)){
            $dateError = "Please enter a valid date";
        }
        else{
            $date = $date_input;
        }
        // game
        if(empty($game_input)){
            $gameError = "Please enter a valid game";
        }
        else{
            $game = $game_input;
        }
        // category
        // if(empty($category_input)){
        //     $categoryError = "Please select a valid category";
        // }
        // else{
        //     $category = $category_input;
        // }
        // glitch
        // if(empty($glitch_input)){
        //     $glitchError = "Please select a valid category";
        // }
        // else{
        //     $glitch = $glitch_input;
        // }
        // video
        if(empty($video_input)){
            $videoError = "Please enter a valid URL";
        }
        else{
            $video = $video_input;
        }
        echo "We have the following info from our form: " . $name . ", " . $time . ", " . $date . ", " . $game . ", " . $category . ", " . $glitch . ", " . $video . ".";
        if(empty($nameError) && empty($timeError) && empty($dateError) && empty($gameError) && empty($categoryError) && empty($glitchError) && empty($videoError)){
            $sql = "INSERT INTO speedruns (name, time, date, game, category, glitch, video) values('$name', '$time', '$date', '$game', '$category', '$glitch', '$video')";
            echo "My Insert SQL Query" . $sql;
            if ($db->query($sql) == TRUE){
                // echo "New Record Created Succesfully";
                // redirect to index.php
                header('Location: index.php');
            }
            else{
                echo "Error: " . $sql . "<br>" . $db->error;
            }
            $db->close();
        }
        // echo "<br> Form Succesfully Submitted.";
    }
    else {
        // echo "Form Not Submitted";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speedrun Records</title>
    <style>
        body{
            background-color: lightgrey !important;
        }
        .container{
            background-color: white;
            padding: 15px;
            margin: 20px;
            border-radius: 10px !important;
            width: 600px !important;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2> Add Your Speedrun Records </h2>
        <hr class="seperator">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" class="form-control <?php echo (!empty($nameError)) ? 'is-invalid':''; ?>" placeholder="Name" value="<?php echo $name ?>">
                <span class="invalid-feedback">
                    <?php echo $nameError; ?>
                </span>
            </div>
            <div class="form-group">
                <label for="time">Time: </label>
                <input type="text" name="time" id="time" class="form-control <?php echo (!empty($timeError)) ? 'is-invalid':''; ?>" value="<?php echo $time ?>">
                <span class="invalid-feedback">
                    <?php echo $timeError; ?>
                </span>
            </div>
            <div class="form-group">
                <label for="date">Date: </label>
                <input type="date" name="date" id="date" class="form-control <?php echo (!empty($dateError)) ? 'is-invalid':''; ?>" value="<?php echo $date ?>">
                <span class="invalid-feedback">
                    <?php echo $dateError; ?>
                </span>
            </div>
            <div class="form-group">
                <label for="game">Game: </label>
                <input type="text" name="game" id="game" class="form-control <?php echo (!empty($gameError)) ? 'is-invalid':''; ?>" placeholder="Game" value="<?php echo $game ?>">
                <span class="invalid-feedback">
                    <?php echo $gameError; ?>
                </span>
            </div>
            <div class="form-group">
                <label for="video">Video Link: </label>
                <input type="url" name="video" id="" class="form-control <?php echo (!empty($videoError)) ? 'is-invalid':''; ?>" placeholder="Video URL Here" value="<?php echo $video ?>">
                <span class="invalid-feedback">
                    <?php echo $videoError; ?>
                </span>
            </div>
            <span>Category: </span>
            <div class="form-check">
                <input class="form-check-input <?php echo (!empty($categoryError)) ? 'is-invalid':''; ?>" type="radio" name="category" id="100">
                <label class="form-check-label" for="100">
                    100%
                </label>
            </div>
           
            <div class="form-check">
                <input class="form-check-input <?php echo (!empty($categoryError)) ? 'is-invalid':''; ?>" type="radio" name="category" id="any" value="any" <?php (!empty($categoryError) && ($category == 'any')?'checked':'' ) ?> >
                <label class="form-check-label" for="any">
                    Any %
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input <?php echo (!empty($categoryError)) ? 'is-invalid':''; ?>" type="radio" name="category" id="low" >
                <label class="form-check-label" for="low">
                    Low %
                </label>
                <span class="invalid-feedback">
                    <?php echo $categoryError; ?>
                </span>
            </div>
            <span>Glitchless: </span>
            <div class="form-check">
                <input type="radio" class="form-check-input <?php echo (!empty($glitchError)) ? 'is-invalid':''; ?>" value="Glitchless" name="glitch" id="">
                <label for="glitchless" class="check-label">Glitchless</label>
             </div>
            
             <div class="form-check">
                 <input type="radio" class="form-check-input <?php echo (!empty($glitchError)) ? 'is-invalid':''; ?>" value="No major glitches" name="glitch" id="">
                 <label for="noglitch" class="check-label">No Major Glitches</label>
                <span class="invalid-feedback">
                    <?php echo $glitchError; ?>
                </span>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>