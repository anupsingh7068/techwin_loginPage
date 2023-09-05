<?php

include "config.php";

$username = $_SESSION['username'];
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $password = $_POST['password'];
    $role = 1;

    $checkQuery = "SELECT * FROM users WHERE username = '$username'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "name already exists.";
    }

    // Check email already exists
    $checkQuery1 = "SELECT * FROM users WHERE useremail= '$useremail'";
    $checkResult1 = mysqli_query($conn, $checkQuery1);

    if (mysqli_num_rows($checkResult1) > 0) {
        echo "email already exists.";
    } else {

        $query = "INSERT INTO users (`username`, `useremail` , `password`,`role`) values('$username', '$useremail', '$password','$role')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "data successfully insert";
        } else {
            echo "data is a not insert";
        }
    }
}


?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <center>



        <form action="" method="post">
            <label for="UserName">UserName:</label>
            <input type="text" name="username" id="name" placeholder="Enter the UserName" required>
            <br> <br>

            <label for="UserEmail">UserEmail:</label>
            <input type="text" name="useremail" id="email" placeholder="Enter the Email" required>
            <br> <br>


            <label for="Password">Password:</label>
            <input type="password" name="password" id="pass" placeholder="Enter the UserPassword" required>
            <br> <br>

            <button type="submit" name="submit">signup</button>


        </form>

        <br>
        <a href="login.php"><button>login</button></a>

    </center>

</body>

</html>