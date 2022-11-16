<script>
history.pushState(null, document.title, location.href);
window.addEventListener('popstate', function (event)
{
  history.pushState(null, document.title, location.href);
});
</script>
<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biometric_test";

// Create connection 
$conn = mysqli_connect($servername, $username, $password, $dbname);

//$conn = mysqli_connect("","","","");

/* session_start();

if(!isset($_SESSION['username']))
{
   header("Location: login.php");
} 



if(!isset($_SESSION['submit']))
{
  $_SESSION['securityquestion1'] = '';
  $_SESSION['securityanswer1'] = '';
  $_SESSION['securityquestion2'] = '';
  $_SESSION['securityanswer2'] = '';
} */

// $username01 = $_SESSION['username'];
$username01 = 'sdasd@ser.com';
// echo "<script type='text/javascript'>alert('Welcome $username01')</script>";

//mysqli_query($conn, $sql1);

$query01 = "SELECT fingerprint1,fingerprint2,fingerprint3,fingerprint4,fingerprint5 FROM register WHERE  email_id='$username01'";
$result01 = mysqli_query($conn, $query01); 

// print_r($result01);   

global $j;

if ($result01->num_rows >= 0)
{
   

   //$row01_val = $result01->fetch_assoc();
// echo "<pre>";  print_r($row01_val); 
// $values_result = array_values( $row01_val );


// echo "------>>>".$row01_val['fingerprint1'];

 
$row01_val = $result01->fetch_assoc();
/* echo "<pre>";  print_r($row01_val);
echo "------>>>".$row01_val['fingerprint2'];

$fp = $row01_val['fingerprint1']; */

 
   

 /*  while($row01 = $result01->fetch_assoc()) 
  {
    $fp = $row01['fingerprint1'];
  } */

   

  // $fp  =  $row01_val[0];  

  // echo "---22--->>>".$fp; 


  
  // function writeMsg($j) { 
  //   global  $conn, $fp;
  
  //         $query01 = "SELECT fingerprint1,fingerprint2,fingerprint3,fingerprint4,fingerprint5 FROM register WHERE  email_id='sdasd@ser.com'";
  //         $result01 = mysqli_query($conn, $query01); 
  //         $row01_val = $result01->fetch_assoc();
  //         $fp  =  $row01_val['fingerprint'.$j];  
  //         $j++;

  //         echo "---$j--->>>".$fp;
  // }

 // writeMsg($j = 1);
    

}



/* for ($i = 1; $i <= count($row01); $i++) {
  echo "-------'fingerprint'.$i---------".$row01['fingerprint'.$i]; 
} 
echo "<pre>";  print_r($fp);  */
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>user-login</title>
<link rel="stylesheet" href="../css/register.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/AdminLTE.min.css">
<link rel="apple-touch-icon" sizes="57x57" href="../favicons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../favicons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../favicons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../favicons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../favicons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../favicons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../favicons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../favicons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../favicons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../favicons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<script src="jquery-1.8.2.js"></script>
<script src="mfs100-9.0.2.6.js"></script>

<script language="javascript" type="text/javascript">


        var quality = 60; //(1 to 100) (recommanded minimum 55)
        var timeout = 10; // seconds (minimum=10(recommanded), maximum=60, unlimited=0 )
        var flag = 0;

// Function used to match fingerprint using jason object 

// echo "-------------11111111----------->".$fp;

/* function Callphpfunction(){ 
    d = document.getElementById("select_id").value;
    alert(d);  
} */







function Match() {
   
  // echo "asdfasfer"; 

  /* if(!$fp){
    echo "<pre>";  print_r($fp);  

  } */

            try {
              //fingerprint stored as isotemplate

              // echo "-------------hi------->".$fp;  


 

             

                // var isotemplate = <?php //echo json_encode($fp); ?>;

                var isotemplate = document.getElementById('txtIsoTemplate').value;;

    // console.log(isotemplate);

                var res = MatchFinger(quality, timeout, isotemplate);

                if (res.httpStaus) {
                    if (res.data.Status) {
                      // echo "------------------>>>".res.data.Status;
 
// alert( res.data.Status);

                        alert("Finger matched");
                        
                        //variable flag used for authentication 
                        
                        flag=1;
                    }
                    else {
// alert( res.data.Status);

                        if (res.data.ErrorCode != "0") {
                            alert(res.data.ErrorDescription);
                        }
                        else {
                            alert("Finger not matched");
                                                         
                            <?php //writeMsg(); ?>
                            
                        }
                    }
                }
                else {
                    alert(res.err);
                }
            }
            catch (e) {
                alert(e);
            }
            return false;

        }

//function to redirect to next page upon fingerprint matching

function redirect(){

    
    if(flag){ 
    window.location.assign("url"); 
    }
    else{
      alert("Scan Your Finger");
    }

  return false;
}

/* function Callphpfunction(){ 

     d = document.getElementById("select_id").value;
    alert(d);
    

  
} */

</script>

</head>
<body class="mainbody">
  <div class="header">

    <img class="left" src="../favicons/apple-icon-60x60.png" height="40" width="40">
  </div>

    <div class="register_panel">
      <div class="panel panel-primary">
          <div class="panel-heading font"> </div>
          <div class="panel-body">
                <form method = "post" name="myForm" action="#">
                    
                    <div class="hide">
                      <table>
                        <tr>
                          <td>
                              Base64Encoded ISO Image
                          </td>
                          <td>
                             <textarea id="txtIsoTemplate" style="width: 500%; height:100px;" class="form-control" > </textarea>
                          </td>
                        </tr>
                      </table>
                    </div>

                    <div>

                    <select name="fg_value" id="select_id" onchange="Callphpfunction(this.value);"> 
                      <option value="1">finger 1</option>
                      <option value="2">finger 2</option>
                      <option value="3">finger 3</option>
                      <option value="4">finger 4</option>
                      <option value="5">finger 5</option>
                    </select>
 

                    </div>

                    <!-- <textarea id="txtIsoTemplate" name="txtIsoTemplate" style="width: 100%; height:50px;" value="" class="form-control"> </textarea> -->


                   
                    
                    <div class="finger_print padd fingerpadd" style="border:solid">

                    <div>
                    <figure>
                    <img src="https://www.larsonjewelers.com/Images/larson-jewelers-fingerprint-engraving-ring.png" alt="finger_print" width="100" height="100">
                    </figure>
                    </div>


                    <div>
                      <button type="input" onclick="return Match()" class="btn btn-default padd" >start scanning</button>
                    </div>
                    
                    </div>
                    

                    
                    <div>
                      <button type="submit" onclick="return redirect()" class="btn btn-primary btn-lg  padd submit_buttom_padding btn-block" value="submit" name="submit">Submit</button>
                    </div>
                    

                    </div>
                    </div>
               </form>
          </div>
       </div>
    </div>
</body>

<script>

  // AJAX
function Callphpfunction(id) {
  // alert("asdfasre");
  var val = id;
  document.getElementById('txtIsoTemplate').value = "";

    $.ajax({
        type: "GET",
        url: "mypage.php",
        data: { val : val }, // "mainid =" + id,
        success: function(data) {
          // alert("success"+result)
          // alert("success-----"+data)
          document.getElementById('txtIsoTemplate').value = data;

            // $("#somewhere").html(result);
        }
    });
};

</script>  


</html>