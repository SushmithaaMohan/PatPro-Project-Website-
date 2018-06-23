<?php
session_start();
$email=$_SESSION['email'];
$conn=mysql_connect("127.0.0.1","root","");
$db=mysql_select_db("reg2",$conn);
$query="SELECT * FROM patient_table WHERE email='$email'";
$result=mysql_query($query);
if($result)
{
$row=mysql_fetch_array($result);
echo'<table border="2" width="500">
        <tr>
        <th>Name</th>
        <td>';
        echo $row['first'];
        echo " ";
        echo $row['last'];
        echo'</td></tr>
        <tr>
        <th>Email</th>
        <td>';
        echo $row['email'];
    echo'</td></tr>
    <tr>
        <th>DOB:</th>
        <td>';
        echo $row['dob_day'];
    echo"/";
    echo $row['dob_month'];
    echo"/";
    echo $row['dob_year'];
    echo'</td></tr>
    <tr>
        <th>Gender</th>';
        if($row['gen']==1)
        {
            echo'<td>Male';
        }
        else{
            echo'<td>Female';
        }
    echo'</td></tr>
</table>';
}
else{
    
echo"No";
}
?>