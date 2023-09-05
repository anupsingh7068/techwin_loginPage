<?php
include "config.php";

$id = $_SESSION['id'];
if (isset($_SESSION['id'])) {
    header("location: welcome.php");
}


if (!isset($id)) {

    header("location: login.php");
}

if (isset($_POST['submit'])) {


    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $password = $_POST['password'];

    $sql = " UPDATE users set username = '$username', useremail = '$useremail', password= '$password' where id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Record updated Succesfully";

        header("location: welcome.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>

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
        <h1>Welcome to User please chang u profile</h1>
    </center>
    <form action="" method="post">

        <label for="username">username:</label>
        <input type="text" name="username" placeholder="update username">
        <br>
        <label for="useremail">useremail</label>
        <input type="email" name="useremail" placeholder="update useremail">
        <br>
        <label for="password">password</label>
        <input type="password" name="password" placeholder="update password" required>
        <br>
        <input type="submit" name="submit">

    </form>

</body>

</html>