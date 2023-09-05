<?php  
include "config.php";
//session_start();
if(isset($_SESSION["username"])){
  header("location: welcome.php");
}
 
if(isset($_POST['submit'])){

    $useremail = $_POST["useremail"];
    $password = $_POST["password"];

   $query1= "SELECT * FROM users WHERE useremail= '$useremail' AND password = '$password' ";
     
   $result1 = mysqli_query($conn, $query1);
   
   if (mysqli_num_rows($result1) == 1){
    
    $row= mysqli_fetch_assoc($result1);
    $_SESSION['id']=$row['id'];
    $_SESSION['role']= $row['role'];

    if($row['role'] == 0){
     
      header("location: admin.php");
   
    }
    else {
      $_SESSION['id']=$row['id'];
      $_SESSION['role']= $row['role'];
      header("location: welcome.php");
   }
  }
   else {
     echo "incorrect Id";
   
   
   }
  
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
</head>

<body>
    <center>



        <form action="" method="post">

            <label for="UserEmail">UserEmail:</label>
            <input type="text" name="useremail" id="email" placeholder="Enter the Email" required>
            <br> <br>


            <label for="Password">Password:</label>
            <input type="password" name="password" id="pass" placeholder="Enter the UserPassword" required>
            <br> <br>

            <button type="submit" name="submit">login</button>

        </form>

    </center>

</body>

</html>