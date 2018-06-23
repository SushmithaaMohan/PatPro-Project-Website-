<html>
<body>
    <form action="ex.php" method="post">
    Enter Patient's Email ID:<input type="text" name="id">
    <input type="submit" value="Submit" name="submit"></form></body></html>
<?php
if(isset($_POST['submit']))
{
$conn=mysql_connect("127.0.0.1","root","");
$db=mysql_select_db("reg2",$conn);
$name=$_POST['id'];
$query="SELECT * FROM `$name";
$data=mysql_query($query);
if($data)
{
echo '<table border="2" width="500">
        <tr>
        <th>Doctor</th>
        <th>Disease</th>
        <th>Date</th>
        </tr>';
        while ($row = mysql_fetch_assoc($data)) {
        echo '<tr>
            <td>'.$row['doctor'].'</td>
            <td>'.$row['disease'].'</td>
            <td>'.$row['date'].'</td>
        </tr>';}
        echo '</table>';
}
else{
    echo"Incorrect patient ID";
}
}
?>