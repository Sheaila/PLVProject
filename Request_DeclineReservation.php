<?php
//returns array of reservation \
$rid = $_REQUEST["var"];
$userID = $_REQUEST['userID'];
$remarks = $_REQUEST['remarks'];
$notifID = $_REQUEST['notifID'];
$reservation = array();
session_start();
include "db_connection.php";
include 'Request_storeNotification.php';
include 'Backend_SendEmail.php';
$conn=OpenCon();
$sql_code = "UPDATE `tbl_reservation` SET `r_approved_ID` = '3' WHERE r_ID = ?";
    if($sql=$conn->prepare($sql_code)){
        $sql->bind_param("i",$r_id);
        $r_id = $rid;
            if($sql->execute()){
                echo "Reservation declined!";
                }
             $sql->close();
        }
    $conn->close();
    getEmail($userID,$rid,$remarks,3);
    update($userID,3,$remarks,0,$notifID);
?>