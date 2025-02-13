<html>

<head>
    <title>PLVRS</title>
    <link rel="icon" href="assets/plv.png">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap-3.4.1-dist/bootstrap-3.4.1-dist/css/bootstrap.min.css">
    <script src="bootstrap-3.4.1-dist/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/side-nav.css">
            <link rel="stylesheet" href="/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <script src="/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/Form.css">
    <link rel="stylesheet" href="css/SpecificallyForModal.css">
    <script type="text/javascript" src="Backend_Modal.php"></script>
</head>

<body>

    <?php
    include "db_connection.php";
    include "Request_storeNotification.php";
    include "Request_CheckUserDetails.php";
    session_start();
    $conn = OpenCon();
    $min = Date("Y-m-d", strtotime('+3 days'));
    $minTime = '08:00';
    $maxTime = '17:00';
    $initialTime = '08:00';
    $initialTime_2 = '09:00';
    $uploadErr = ""; 
    //determine if admin
  
    ?>
    <sidenav>
        <?php
         if (isset($_SESSION['userID'])) {
         if ($_SESSION['user_verified'] == 'not verified') {
            echo '<script>
            modal("Please confirm the OTP that was sent to your Email!",function(){
                window.location.href = "Window_OTP.php?code='.$_SESSION['user_code'].'"
            })
            </script>';
        } else {
            require "Backend_CheckifLoggedIN.php";
             $remarks = checkDetails($_SESSION['userID']);
        if (isset($remarks)) {
            echo '<script>
            modal("'.$remarks.'.",function(){
                window.location.href = "Window_HomePage.php"
            })
            </script>';
        } else {
            if ($_SESSION["isAdmin"] == 1) {
                $approveID = 1;
            } else {
                $approveID = 2;
            }
        }
        }
    } else {
        echo '<script>
        modal("Please Log in first.",function(){
            window.location.href = "index.php"
        })
        </script>';
    }
        ?>
    </sidenav>
    <nav>
            <div class="navbar">
            <div class="nav2">
                  
            </div>
            </div>
        </nav>
        <div class="container">
        <div class="form-container shadow-lg p-3 mb-5 bg-white rounded">
            <legend>FORM</legend>
            <input type='button' class="btn btn-primary" onclick="addReservation()" value='Add' style='float:right' >
            <label for="Name">Name:</label>
            <input class="form-control" type="text" id="fullName" disabled name="Name" ><br><br>
            <label for="Course">Course:</label>
            <input class="form-control" type="text" id="course" disabled name="Course"><br><br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" id="reservationForm">
            </form>
        </div>
    </div>
    </div>
    <?php
    require "Backend_ReservationForm.php";
    ?>
</body>
<!-- <link rel="stylesheet" href="/CSS/Form.css"> -->

</html>