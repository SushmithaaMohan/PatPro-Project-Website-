<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Profile</title>
        <link rel="icon" href="Resources/img/login-icon.png">
        <link rel="stylesheet" type="text/css" href="Resources/css/view-patient-style.css">
        <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
        <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400" rel="stylesheet">
    </head>
    <body>
        <header>
        <table class="table1">
            <tr>
                <td rowspan="3" class="img1"><img src="Resources/img/generic-user.png"></td>
                <td class="col2">Name</td>
                <td class="col3"><?php
                    session_start();
                    $email=$_SESSION['email'];
                    $conn=mysql_connect("127.0.0.1","root","");
                    $db=mysql_select_db("reg2",$conn);
                    $row=mysql_query("SELECT * FROM doctor_table WHERE email='$email' ");
                    $data=mysql_fetch_assoc($row);
                    echo $data['first'];
                    echo " ";
                    echo $data['last'];
                     ?></td>
            </tr>
            <tr>
                <td class="col2">No. of Patients</td>
                <td class="col3"><?php 
                
                    $email=$_SESSION['email'];
                    $conn=mysql_connect("127.0.0.1","root","");
                    $db=mysql_select_db("reg2",$conn);
                    $row=mysql_query("SELECT * FROM `$email` ");
                    $ans=mysql_num_rows($row);
                    echo $ans;
                    ?></td>
            </tr>
            <tr>
                <td class="col2">Location</td>
                <td class="col3"><input placeholder="India" type="text" id="location" disabled></td>
            </tr> 
            
        </table>
        </header>
        
        <hr>
        <section>
            <?php
                
                $doctor_email=$_SESSION['email'];
                $query="SELECT * FROM `$doctor_email`";
                $result=mysql_query($query);
                    echo '<table border="1" width="1300">
    <tr>
        <th>Name</th>
        <th>Email ID</th>
        
    </tr>';

while ($row = mysql_fetch_array($result)) {
    echo '
        <tr>
            <td>'.$row['pat_name'].'</td>
            <td>'.$row['pat_email'].'</td>
        </tr>';

}

echo '
</table>';
            ?>
            <a color="red"mouse="context-menu" href="patient_diseases.php">View Diseases</a>
        </section>
        
        <a class="backtohome" href="dochome.html">Back to Home</a>
    </body>
</html>
