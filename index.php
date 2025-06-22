<?php
$insert = false;

//set connection variables
if(isset($_POST['name'])){
$server = "localhost";   
$username = "root";
$password = "";
$database = "trip";          
$port = 3307;


//created a database connection
$con = mysqli_connect($server, $username, $password, $database, $port);


//check for connection success
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Success: Connected to MySQL on port $port";


//collect post variables
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $other=$_POST['desc'];
    $sql =  "INSERT INTO `trip`.`trip` (`Name`, `Age`, `Gender`, `Email`, `Contact No`, `Other`, `dt`) 
        VALUES ('$name', '$age', '$gender', '$email', '$contact', '$other', current_timestamp())";
    
    //execute the query
    if($con->query($sql) == true){
        //echo "Successfully inserted";

        //flag for successful insertion
        $insert = true;
        
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    //close the database connection
    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <img class = "bg" src="bg.avif" alt="travel">
    <div class="container">
        <h1>Welcome to Travel Form </h1><br>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
       <?php
            if ($insert == true) {
                echo "<p class='submitMsg'>(Thanks for submitting the form. We are excited to see you joining with us.)</p>";
            }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="contact" id="contact" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any queries"></textarea>
            <button class="btn">Submit</button>
            <button class="btn">Reset</button>

        </form>
    </div>

    <script src="index.js"></script>
    
</body>
</html>
