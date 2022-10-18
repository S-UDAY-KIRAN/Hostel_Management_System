<?php

$con=mysqli_connect("localhost","root","","hostel");

if(!$con)
{
    die("connection failed".mysqli_error($con));
}

echo"<html>
<head>
<title>STUDENT UPDATE DETAILS</title>
</head>
<body style='background-image:linear-gradient(to right,rgba(28, 182, 67, 0.473),rgba(0, 255, 21, 0.74));'>
<h3 align='center'    style='font-size: xx-large;
font-family: system-ui;
font-weight: 900;'>UPDATE DETAILS</h3>
    <ul align='right'>
    <a href='studentmain.php' style='text-decoration: none;' ><img src='image/left-arrow.png' alt='BACK' title='BACK' style='width: 50px;height: 50px;margin-left: 450px;padding-left:40px;'><b>BACK</b></a>
    <a href='studentmain.php' style='text-decoration: none;'><img src='image/home.png' title='HOME' alt='HOME'  style='width: 50px;height: 50px;padding-left:40px;'><b>HOME</b></a>
    <a href='index.php' style='text-decoration: none;'><img src='image/exit.png' alt='LOGOUT' title='LOGOUT' style='width: 50px;height: 50px; padding-left:45px;'><b>LOG OUT</b></a>    
    </ul>
    <center>
    <form action='ok.php' method='post' align='center'class='form'>
    <img src='image/profile.png' title='STUDENT NAME' alt='STUDENT NAME'  align='center' style='width: 50px;height: 50px;'>
    <input type='text' name='sname' placeholder='STUDENT NAME' style='width: 200px;'><br><br>
    <img src='image/key.png' title='PASSWORD' alt='PASSWORD'  align='center' style='width: 50px;height: 50px;'>
    <input type='password' name='password' placeholder='PASSOWRD' style='width: 200px;'><br><br>
    <img src='image/door.png' title='ROOM NO' alt='ROOM NO'  align='center' style='width: 50px;height: 50px;'>
    <select name='roomno' style='width: 200px;'>
        <option value=''>SELECT ROOM NUMBER</option>
        <option value='101'>101</option>
        <option value='102'>102</option>
        <option value='103'>103</option>
        <option value='104'>104</option>
        <option value='105'>105</option>
        <option value='106'>106</option>
    </select><br><br>
    <img src='image/phone-call.png' title='PHONE NUMBER' alt='PHONE NUMBER'  align='center' style='width: 50px;height: 50px;'>
    <input type='text' name='phno' placeholder='PHONE NUMBER' style='width: 200px;'><br><br>
    <img src='image/mortarboard.png' title='COURSE' alt='COURSE'  align='center' style='width: 50px;height: 50px;'>
    <input type='text' name='course' placeholder='COURSE' style='width: 200px;'><br><br>
    <img src='image/university.png' title='COLLEGE' alt='COLLEGE'  align='center' style='width: 50px;height: 50px;'>
    <input type='text' name='college' placeholder='COLLEGE' style='width: 200px;'><br><br>
    <img src='image/address.png' title='ADDRESS' alt='ADDRESS'  align='center' style='width: 50px;height: 50px;'>
    <input type='text' name='address' placeholder='ADDRESS' style='width: 200px;'><br><br>
    <button type='submit' name='submmit' value='' style='width: 50px;height: 50px;background-color:Cyan;margin:0%;padding:0%;border:0px;'>
    <img src='image/forward.png' alt='UPDATE' title='UpDATE' style='width: 50px;height: 50px;'></button><br><br>
    </form></center>
    <style>
.form
    {
        background-color:cyan;
        margin-left: 400px;
        margin-right: 400px;
        padding-top:10px;
        padding-bottom:10px;
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
";

$sname=$_POST['sname'] ?? '';
$password=$_POST['password'] ?? '';
$phno=$_POST['phno'] ?? '';
$course=$_POST['course'] ?? '';
$college=$_POST['college'] ?? '';
$address=$_POST['address'] ?? '';
$time=date("d/m/y h:i:s a") ?? '';
$roomno=$_POST['roomno'] ?? '';

$sql1="SELECT * FROM student WHERE sname='$sname' ";
$result1=mysqli_query($con,$sql1);
$sql6="SELECT * FROM rooms WHERE roomnum='$roomno' ";
$result6=mysqli_query($con,$sql6);


if($result1 && $result6 && !empty($sname))
{
    $arr1=mysqli_fetch_assoc($result1);
    $arr6=mysqli_fetch_assoc($result6);
    $currcap=$arr6['currcap'] ?? '';
    $totalcap=$arr6['totalcap'] ?? '';
    $oldroom=$arr1['roomno'] ?? '';
    if(mysqli_num_rows($result1)>0 &&  $password==$arr1['password'])
    {
        if($currcap >= $totalcap)
        {
            echo"<center><table border size=1><th>ROOM IS FULL</th></table></center>";
        }
        else
        {
            
            $sql2="UPDATE student SET roomno='$roomno',phone='$phno',course='$course',college='$college', address='$address' WHERE sname='$sname' AND password='$password'";
            $result2=mysqli_query($con,$sql2);
            if($result2)
            {
                $sql3="UPDATE rooms SET currcap=currcap-1 WHERE roomnum='$oldroom' ";
                $result3=mysqli_query($con,$sql3);
                $sql4="UPDATE rooms SET currcap=currcap+1 WHERE roomnum='$roomno' ";
                $result4=mysqli_query($con,$sql4);
                $sql5="SELECT * FROM student WHERE sname='$sname' AND password='$password'";
                $result5=mysqli_query($con,$sql5);
                if($result5 && mysqli_num_rows($result5)>0)
                {
                    while( $arr5=mysqli_fetch_assoc($result5))
                    {
                        echo"<center><br><br>UPDATED DETAILS:<br><br>";
                        echo"<table border size=1 class='table'>";
                        echo"<tr><th>STUDENT NAME</th><td>".$arr5['sname']."</td></tr>";
                        echo"<tr><th>ROOM NO</th><td>".$arr5['roomno']."</td></tr><";
                        echo"<tr><th>PHONE NO</th><td>".$arr5['phone']."</td></tr><";
                        echo"<tr><th>COURSE</th><td>".$arr5['course']."</td></tr><";
                        echo"<tr><th>COLLEGE</th><td>".$arr5['college']."</td></tr><";
                        echo"<tr><th>ADDRESS</th><td>".$arr5['address']."</td></tr><";
                        echo"<tr><th>REG DATE</th><td>".$arr5['regdate']."</td></tr><";
                        echo"</table><br><br></center>";
                    }

                }
            }
        }
    }
    else
    {
        
        echo"<center><table border size=1><th>INCORRECT NAME OR PASSWORD </th></table></center>";
    }
}
echo"<br><br><br><br><footer align='center'>&copy; All Rights Reserved,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<a href='#' align='right' title='CONTACT US' style='text-decoration: none;'><img src='image/contact.png' alt='CONTACT US' style='width: 50px;height: 50px;'>
</a></footer>";
die(mysqli_error($con));

?>
