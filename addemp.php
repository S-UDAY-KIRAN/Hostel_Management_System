<?php

$con=mysqli_connect("localhost","root","","hostel");

if(!$con)
{
    die("connection failed".mysqli_error($con));
}

echo"<html>
<head>
<title>ADD NEW EMPLOYEE</title>
</head>
<body style='background-image:linear-gradient(to right,rgba(28, 182, 67, 0.473),rgba(0, 255, 21, 0.74));'>
<h3 align='center'style='font-size: xx-large;
    font-family: system-ui;
    font-weight: 900;
    margin-top: 60px;
    margin-bottom: 0px;
    padding-bottom: 10px;'>
    ADD EMPLOYEE
</h3>
    <ul>
        <a href='empdetails.php' style='text-decoration: none;'><img src='image/left-arrow.png' alt='BACK' title='BACK' style='width: 50px;height: 50px;padding-rightleft:50px;margin-left:750px;'><b>BACK</b></a>
        <a href='adminmain.php' style='text-decoration: none;'><img src='image/home.png' title='HOME' alt='HOME'  style='width: 50px;height: 50px;padding-left:50px;'><b>HOME</b></a>
        <a href='index.php' style='text-decoration: none;'><img src='image/exit.png' alt='LOGOUT' title='LOGOUT' style='width: 50px;height: 50px; padding-left:50px;'><b>LOG OUT</b></a>    
    </ul>
   
    <form action='addemp.php' class='addempform'  method='post' align='center' >
        <img src='image/profile.png' title='EMPLOYEE NAME' alt='EMPLYOEE NAME'  align='center' style='width: 50px;height: 50px;'>
        <input type='text' name='ename' placeholder='EMPLOYEE NAME' ><br><br><br>
        <img src='image/school-bag.png' title='EMPLOYEE JOB' alt='EMPLYOEE JOB' style='width: 50px;height: 50px;'>
        <input type='text' name='ejob' placeholder='EMPLOYEE JOB' ><br><br><br>
        <img src='image/phone-call.png'  title='EMPLOYEE PHONE NUMBER' alt='EMPLYOEE PHONE NUMBER' style='width: 50px;height: 50px;'>
        <input type='text' name='ephno' placeholder='EMPLOYEE PHONE NUMBER'  ><br><br><br>
        <img src='image/address.png' alt='EMPLYOEE ADDRESS' title='EMPLOYEE ADDRESS' style='width: 50px;height: 50px;'>
        <input type='text' name='eaddress' placeholder='EMPLOYEE ADDRESS' ><br><br><br>
        <button type='submit' name='submmit' value='' style='width: 50px;height: 50px;background-color:Cyan;margin:0%;padding:0%;border:0px;'>
        <img src='image/plus.png' alt='ADD' title='ADD' style='width: 50px;height: 50px;'></button>
    </form>
</body>
<style>
    .addempform
    {
        background-color:cyan;
        margin-left: 400px;
        margin-right: 400px;
    }
    .addempform input
    {
        width: 200;
    }
    .emptable
    {
        background-color:Aqua;
    } 
    .emptable th
    {
        background-color:Tomato;
    }
    </style>

</html>";

$ename=$_POST['ename'] ?? '';
$ejob=$_POST['ejob'] ?? '';
$ephno=$_POST['ephno'] ?? '';
$eaddress=$_POST['eaddress'] ?? '';


$sql1="SELECT * FROM employee WHERE ename='$ename' AND ephno='$ephno'";
$result1=mysqli_query($con,$sql1);
if(mysqli_num_rows($result1)>0 && !empty($ename))
{
    while($arr1=mysqli_fetch_assoc($result1))
    {
        echo"<center>EMPLOYEE ALREADY EXISTS</center>";
        echo"<br><br>
        <center><a href='empdetails.php' aria-label='BACK'>
        <img src='image/left-arrow.png' alt='BACK' title='BACK' style='width: 50px;height: 50px;'>
        </a></center>
        <br><br>
        <footer align='center'>&copy; All Rights Reserved,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <a href='#' align='right' title='CONTACT US' style='text-decoration: none;'><img src='image/contact.png' alt='CONTACT US' style='width: 50px;height: 50px;'>
        </a></footer>";
        exit;
    }
}
else
{
    if(isset($ename) && isset($ejob))
    {
        
        $sql2="INSERT INTO employee VALUES('$ename','$ejob','$ephno','$eaddress')";
        $result2=mysqli_query($con,$sql2);
        $sql3="SELECT * FROM employee WHERE ename='$ename' AND ephno='$ephno'";
        $result3=mysqli_query($con,$sql3);
        if(mysqli_num_rows($result3)>0 && !empty($ename))
        {
            echo"<center>EMPLOYEE ADDED<br><br><table border size=1 class='emptable'><tr><th>EMPLOYEE NAME</th><th>EMPLOYEE JOB</th><th>EMPLLOYEE PHONE NUMBER</th><th>EMPLOYEE ADDRESS</th></tr>";
            while($arr3=mysqli_fetch_assoc($result3))
            {
                echo"<tr><td>".$arr3['ename']."</td><td>".$arr3['ejob']."</td><td>".$arr3['ephno']."</td><td>".$arr3['eaddress']."</td></tr>";
            }
            echo"</table></center>";
        }
    }
}

echo"
<br><br>
<br><br>
<footer align='center'>&copy; All Rights Reserved,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<a href='#' align='right' title='CONTACT US' style='text-decoration: none;'><img src='image/contact.png' alt='CONTACT US' style='width: 50px;height: 50px;'>
</a></footer>";
exit;
die(mysqli_error($con));

?> 