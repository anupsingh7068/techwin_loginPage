<?php

include "config.php";
$id = $_SESSION['id'];

if (!isset($_SESSION['id'])) {

  header("location: login.php");
}

?>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="">
  <style>
    table,
    th,
    td {
      border: 1px solid black;
    }
  </style>
</head>

<body>

  <h1 style="color: green;">welcome to user</h1>
  <center>

    <form action="" method="post">

      <a href="logut.php">logout</a>

    </form>
    <table>
      <thead>
        <tr>
          <th>Name:</th>
          <th>Email:</th>
          <th>Password:</th>
          <th>update</th>
          <th>delete</th>
        </tr>
      </thead>

      <tbody>

        <?php
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {


          while ($row = mysqli_fetch_assoc($result)) {

        ?>
            <tr>
              <td>
                <?php echo $row['username']; ?>
              </td>
              <td> <?php echo $row['useremail']; ?></td>
              <td> <?php echo $row['password']; ?>
              </td>
              <th> <a href="update.php">update</a></th>
              <th><a href="delete.php">delete</a></th>
            </tr>
        <?php
          }
        }

        ?>

      </tbody>

    </table>
    <br>
  </center>


</body>

</html>