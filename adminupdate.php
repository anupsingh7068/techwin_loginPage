<?php
include "config.php";


$id = $_SESSION['id'];
$role = $_SESSION['role'];

$user_id = $_REQUEST['id'];

if (!isset($id)) {

    header("location: login.php");
}

if (!isset($user_id)) {

    header("location: admin.php");
}
$nameerr = "";
if (isset($_POST['submit'])) {


    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET username = '$username', useremail = '$useremail', password = '$password' WHERE  id = '$user_id'";

    $result = mysqli_query($conn, $sql);


    if ($result) {
        echo "Record updated Succesfully";

        header("location: adminupdate.php");
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
    <?php
    $sql = "SELECT * from users where id ='$user_id'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $rows = mysqli_fetch_assoc($result);
    }
    ?>
    <center>
        <h1>Welcome to User please chang u profile</h1>
    </center>
    <form action="" method="post">

        <label for="username">username:</label>
        <input type="text" name="username" value=" <?php echo $rows['username']; ?> ">
        <span><?php ?></span>
        <br>
        <label for="useremail">useremail</label>
        <input type="email" name="useremail" value=" <?php echo $rows['useremail']; ?>" required>
        <br>
        <label for="password">password</label>
        <input type="password" name="password" value="<?php echo $rows['password']; ?>" required>
        <br>
        <input type="submit" name="submit">

    </form>

</body>

</html>