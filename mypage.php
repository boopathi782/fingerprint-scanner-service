<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biometric_test";

// Create connection 
$conn = mysqli_connect($servername, $username, $password, $dbname);

// echo "--------dec---". $_GET['val'];

// return $_GET['val'];
// echo  "hihihihih  ";


    if(isset($_GET['val'])){
        //mainInfo($_GET['mainid']);
        //   alert("success"+result)
        // echo  $_GET['val'];
        

        if($_GET['val'] == 1){
            $query01 = "SELECT fingerprint1 FROM register WHERE  email_id='sdasd@ser.com'";
            $result01 = mysqli_query($conn, $query01); 
            $row01_val = $result01->fetch_assoc();
            echo $fp  =  $row01_val['fingerprint1']; 
        }
        if($_GET['val'] == 2){
            $query01 = "SELECT fingerprint2 FROM register WHERE  email_id='sdasd@ser.com'";
            $result01 = mysqli_query($conn, $query01); 
            $row01_val = $result01->fetch_assoc();
        echo $fp  =  $row01_val['fingerprint2']; 
        }

        if($_GET['val'] == 3){
            $query01 = "SELECT fingerprint3 FROM register WHERE  email_id='sdasd@ser.com'";
            $result01 = mysqli_query($conn, $query01); 
            $row01_val = $result01->fetch_assoc();
        echo $fp  =  $row01_val['fingerprint3']; 
        }
        if($_GET['val'] == 4){
            $query01 = "SELECT fingerprint4 FROM register WHERE  email_id='sdasd@ser.com'";
            $result01 = mysqli_query($conn, $query01); 
            $row01_val = $result01->fetch_assoc();
        echo $fp  =  $row01_val['fingerprint4']; 
        }

        if($_GET['val'] == 5){
            $query01 = "SELECT fingerprint5 FROM register WHERE  email_id='sdasd@ser.com'";
            $result01 = mysqli_query($conn, $query01); 
            $row01_val = $result01->fetch_assoc();
        echo $fp  =  $row01_val['fingerprint5']; 
        }




// $query01 = "SELECT fingerprint1,fingerprint2,fingerprint3,fingerprint4,fingerprint5 FROM register WHERE  email_id='sdasd@ser.com'";

        //   $result01 = mysqli_query($conn, $query01); 
        //   $row01_val = $result01->fetch_assoc();
        //   $fp  =  $row01_val['fingerprint1'];  

    }
?>