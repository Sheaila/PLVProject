<?php
$eAvailability = $_REQUEST['availability'];
$eID = $_REQUEST['ID'];
include "db_connection.php";
$conn=OpenCon();
$sql_code = "UPDATE tbl_user SET r_marked= ? WHERE tbl_user.user_ID =?";
    if($sql=$conn->prepare($sql_code)){
        $sql->bind_param("ii",$eAvailability,$eID);
            if($sql->execute()){
                echo "Edit Success";
                }else {
                echo  $conn->error;
            }
             $sql->close();
        }
    $conn->close();
?>