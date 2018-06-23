<?php
session_start();
$conn=mysql_connect("127.0.0.1","root");
$db=mysql_select_db("reg2",$conn);

 function add() 
{ /**/
$email=$_POST['email'];
$disease=$_POST['disease'];
$doctor_email=$_SESSION['email'];
     $data=mysql_query("SELECT * FROM patient_table WHERE email='$email'");
     $row=mysql_fetch_assoc($data);
     $patname=$row['first'];
      mysql_query("CREATE TABLE  `$doctor_email`(pat_name varchar(40),pat_email varchar(40))"); 
     
     mysql_query("INSERT INTO `$doctor_email` VALUES('$patname','$email')");
     $q1="SELECT * FROM `$email`";
     $data=mysql_query($q1);
     if($data)
     {
     $query="INSERT INTO `$email` VALUES ('$disease','$doctor_email',NOW())"; 
     $data = mysql_query($query) or die(mysql_error());
     header('location:dochome.html');
    
     }
     else
     {
          mysql_query("CREATE TABLE  `$email`(disease varchar(40),doctor varchar(40),date DATE)"); 
         mysql_query("INSERT INTO `$email` VALUES ('$disease','$doctor_email',NOW())");
         echo "Here";
         header('location:dochome.html');
     }
  
    
 }
 
if(isset($_POST['submit'])) 
{ 
add(); 
}
mysql_close($conn);
?>





    <!--
<? php
    
echo"hi";
$conn=mysql_connect("127.0.0.1","root");
$db=mysql_select_db("reg2",$conn);



if(isset($_POST['submit']))
{   echo"hi1";
 $email=$_POST['email'];
 $disease=$_POST['disease'];

    $query="CREATE TABLE $email (disease varchar(40),doctor varchar(40),date DATE)";
         $data = mysql_query ($query) or die(mysql_error());
     
    
        $query2="INSERT INTO $email(disease,doctor,date) VALUES ($disease,"doctor1", NOW())";
        $data = mysql_query ($query2) or die(mysql_error());
        if($data)
        { 
            echo"hi2";
            header("Location:docReg.html");
        }
}

?>
-->
