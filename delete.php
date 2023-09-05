
<?php 

include "config.php";

$id = $_SESSION['id'];

if(!isset( $id)){

    header("location: welcome.php");


}


if(isset($id)){


    $sql = "DELETE FROM users WHERE id = $id "; 

    $result = mysqli_query($conn, $sql);

   
    if($result==true){
       echo "delete succesfully record";
    
       header("location: welcome.php");
       
    }

}




?>