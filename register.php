<?php
$conn=mysql_connect("127.0.0.1","root");
$db=mysql_select_db("reg2",$conn);
 
function NewUser() 
{ 
 $first = $_POST['First']; 
$last = $_POST['Last']; 
$email = $_POST['email']; 
$password = $_POST['pass'];
$dob_day=$_POST['dob_day'];
$dob_month=$_POST['dob_month'];
$dob_year=$_POST['dob_year'];
$gen=$_POST['gen'];
$class=$_POST['class'];
    if($_POST['class']==1)
{
    $query = "INSERT INTO doctor_table(first,last,email,pass,dob_day,dob_month,dob_year,gen,date) VALUES ('$first','$last','$email','$password','$dob_day','$dob_month','$dob_year','$gen',NOW())";
    
    $data = mysql_query ($query) or die(mysql_error());
        if($data)
        {
            header("Location:docReg.html");
        }
}
    else 
    {
       $query = "INSERT INTO patient_table(first,last,email,pass,dob_day,dob_month,dob_year,gen) VALUES ('$first','$last','$email','$password','$dob_day','$dob_month','$dob_year','$gen')"; 
    
     $data = mysql_query ($query) or die(mysql_error());    if($data)
     {
         header("Location:login.html");
     }
    }
     
}
 function SignUp() 
{ 
if(!empty($_POST['First'])) 
{//checking the 'user' name which is from Sign-Up.html, is it empty or have some text 
 if($_POST['class']==1)
 {
$query = mysql_query("SELECT * FROM doctor_table WHERE email = '$_POST[email]'"); 
 }
    
    else
    {
        $query = mysql_query("SELECT * FROM patient_table WHERE email = '$_POST[email]'"); 
    }
if($row = mysql_fetch_array($query))
 { 
    echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
 } 
     

else 
{ 
    NewUser(); 
}
}
}

if(isset($_POST['submit'])) 
{ 
   
SignUp(); 
}
mysql_close($conn);
?>
