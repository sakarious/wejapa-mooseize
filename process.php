<?php

$fname =$_POST["fname"];

$lname = $_POST["lname"];
  
$email = $_POST["email"];

$dob = $_POST["dob"];

$fc = $_POST["fc"];

$gender = $_POST["gender"][0];

$dept = $_POST["dept"];

$pass = $_POST["pass"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
</head>
<body style= 'background-color: <?php echo $fc; ?>'>





    
  
    <h1>Thank You</h1>
    <p>Here is the information you have submitted:</p>
    <ol>
        <li><em>First Name:</em> <?php echo $fname ?></li>
        <li><em>Last Name:</em> <?php echo $lname ?></li>
        <li><em>Email:</em> <?php echo $email ?></li>
        <li><em>Date of Birth:</em> <?php echo $dob ?></li>
        <li><em>Favourite Color:</em> <?php echo $fc ?></li>
        <li><em>Gender:</em> <?php echo $gender ?></li>
        <li><em>Department:</em> <?php echo $dept ?></li>
        <li><em>Password:</em> <?php echo $pass ?></li>
    </ol>
</body>
</html>