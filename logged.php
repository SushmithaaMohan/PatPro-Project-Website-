<?php
session_start();
$conn=mysql_connect("127.0.0.1","root");
$db=mysql_select_db("reg2",$conn);

 function login() 
{
 $email = $_POST['email'];
 $password = $_POST['pass'];
 $class = $_POST['class'];
 $_SESSION["email"]=$email;
  
     

     if($class == '3')
     {
 $query = mysql_query("SELECT * FROM doctor_table WHERE email ='$_POST[email]' AND pass ='$_POST[pass]'"); 
        
        if($row = mysql_fetch_array($query) or die(mysql_error()))
        { 
    header("Location:dochome.html");
        } 
           
     }
         else
     {
        $query = mysql_query("SELECT * FROM patient_table WHERE email ='$_POST[email]' AND pass ='$_POST[pass]'"); 
         
         if($row = mysql_fetch_array($query) or die ("wrong"))
        { 
    header("Location:pathome.html");
         } 
         
     }
 }
 
if(isset($_POST['submit'])) 
{ 
login(); 
}
mysql_close($conn);
?>
