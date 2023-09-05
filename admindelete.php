
<?php 

include "config.php";

$id = $_SESSION['id'];
$role = $_SESSION['role'];

$user_id = $_REQUEST['id'];

if(!isset( $id)){

    header("location: admin.php");


}


if(isset($id)){


    $sql = "DELETE FROM users WHERE  id ='$user_id'"; 

    $result = mysqli_query($conn, $sql);
    
    if($result==true){
       echo "delete succesfully record";
    
       header("location: admin.php");
       
    }

}




?>