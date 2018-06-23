
<?php
session_start();
$conn=mysql_connect("127.0.0.1","root","");
$db=mysql_select_db("reg2",$conn);
$name=$_SESSION['email'];
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
?>