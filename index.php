<?php
$insert = false;
if(isset($_POST['name'])){
$server="localhost";
$username="root";
$password="";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("connecrion to this database failed due to". mysqli_connect_error());
}
// echo"Success connecting to db";

$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
$sql="INSERT INTO `travel`.`travel` ( `name`, `age`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;

if($con->query($sql)== true){
    // echo "Sucessfully inserted";
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}
$con->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- <img class ="bg" src="download (30).jpg" alt="background" > -->
    <div class="container">
        <h1> Welcome to our US Trip Form</h1>
        <p>Enter your details and sumbit to confirm your participation for trip</p>
        <?php
        if($insert == true){

        echo"<p class ='submitmsg'>Thanks for submitting your Form!</p>";
    }
        ?>

        <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="age" id="age" placeholder="Enter your age">
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <input type="number" name="phone" id="phone" placeholder ="Enter your phone number">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder ="Enter any other information"></textarea>
        <button class="btn">Submit</button>
    </form>
    </div>
    <script src="index.js"></script>

</body>
</html>