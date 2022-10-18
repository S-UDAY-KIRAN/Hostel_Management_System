<?php

$con=mysqli_connect("localhost","root","","hostel");

if(!$con)
{
    die("connection failed".mysqli_error($con));
}

echo"<html>
<head>
<title>STUDENT SIGN UP</title>
</head>
<body style='background-image:linear-gradient(to right,rgba(28, 182, 67, 0.473),rgba(0, 255, 21, 0.74));'>
<h3 align='center'    style='font-size: xx-large;
font-family: system-ui;
font-weight: 900;'>NEW REGISTRATION</h3>
<ul align='right'>
<a href='studentlogin.php' style='text-decoration: none;' ><img src='image/left-arrow.png' alt='BACK' title='BACK' style='width: 50px;height: 50px;margin-left: 650px;padding-left:20px;'><b>BACK</b></a>
<a href='index.php' style='text-decoration: none;'><img src='image/home.png' title='HOME' alt='HOME'  style='width: 50px;height: 50px;padding-left:40px;'><b>HOME</b></a>
</ul>
    <center>
    <form action='studentreg.php' method='post' align='center'class='form'>
    <img src='image/profile.png' title='STUDENT NAME' alt='STUDENT NAME'  align='center' style='width: 50px;height: 50px;'>
    <input type='text' name='sname' placeholder='STUDENT NAME' style='width: 200px;' required><br><br>
    <img src='image/door.png' title='ROOM NO' alt='ROOM NO'  align='center' style='width: 50px;height: 50px;'>
    <select name='roomno' style='width: 200px;' required>
        <option value=''>SELECT ROOM NUMBER</option>
        <option value='101'>101</option>
        <option value='102'>102</option>
        <option value='103'>103</option>
        <option value='104'>104</option>
        <option value='105'>105</option>
        <option value='106'>106</option>
    </select><br><br>
    <img src='image/phone-call.png' title='PHONE NUMBER' alt='PHONE NUMBER'  align='center' style='width: 50px;height: 50px;'>
    <input type='text' name='phno' placeholder='PHONE NUMBER' style='width: 200px;' required><br><br>
    <img src='image/mortarboard.png' title='COURSE' alt='COURSE'  align='center' style='width: 50px;height: 50px;'>
    <input type='text' name='course' placeholder='COURSE' style='width: 200px;' required><br><br>
    <img src='image/university.png' title='COLLEGE' alt='COLLEGE'  align='center' style='width: 50px;height: 50px;'>
    <input type='text' name='college' placeholder='COLLEGE' style='width: 200px;' required><br><br>
    <img src='image/address.png' title='ADDRESS' alt='ADDRESS'  align='center' style='width: 50px;height: 50px;'>
    <input type='text' name='address' placeholder='ADDRESS' style='width: 200px;' required><br><br>
    <img src='image/key.png' title='PASSWORD' alt='PASSWORD'  align='center' style='width: 50px;height: 50px;'>
    <input type='password' name='password' placeholder='PASSOWRD' style='width: 200px;' required><br><br>
    <button type='submit' name='submit' value='' style='width: 50px;height: 50px;background-color:Cyan;margin:0%;padding:0%;border:0px;'>
    <img src='image/plus.png' alt='REGISTER' title='REGISTER' style='width: 50px;height: 50px;'></button><br><br>
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
</html>";

$sname=$_POST['sname'] ?? '';
$password=$_POST['password'] ?? '';
$phno=$_POST['phno'] ?? '';
$course=$_POST['course'] ?? '';
$college=$_POST['college'] ?? '';
$address=$_POST['address'] ?? '';
$time=date("d/m/y h:i:s a") ?? '';
$roomno=$_POST['roomno'] ?? '';

$sql1="SELECT * FROM rooms WHERE roomnum='$roomno'";
$result1= mysqli_query($con,$sql1);
if($result1)
{
    if(mysqli_num_rows($result1)>0)
    {
        $arr1=mysqli_fetch_assoc($result1);
        if($arr1['currcap']<$arr1['totalcap'])
        {
            $sql2="INSERT INTO student VALUES('$sname','$password','$roomno','$phno','$course','$college','$address','$time')";
            $result2=mysqli_query($con,$sql2);
            $sql3="UPDATE rooms SET currcap=currcap+1 where roomnum='$roomno'";
            $result3=mysqli_query($con,$sql3);
        }
        else
        {
            echo"<center><table border size=1><th>ROOM IS CURRENTLY FULL<br>TRY AGAIN CHOOSE DIFFERENT ROOM</th></table></center>";
            header("Refresh:5 URL=studentreg.php");
        }
    }
}
$sql4="SELECT * FROM student WHERE sname='$sname' ";
$result4=mysqli_query($con,$sql4);


if($result4)
{
    while($arr=mysqli_fetch_assoc($result4))
    {
            echo"<center><br/><br/>ENTERED DETAILS:<br/><br/>";
            echo"<table border size=1>";
            echo"<tr><th>STUDENT NAME</th><td>".$arr['sname']."</td></tr>";
            echo"<tr><th>ROOM NO</th><td>".$arr['roomno']."</td></tr><";
            echo"<tr><th>PHONE NO</th><td>".$arr['phone']."</td></tr><";
            echo"<tr><th>COURSE</th><td>".$arr['course']."</td></tr><";
            echo"<tr><th>COLLEGE</th><td>".$arr['college']."</td></tr><";
            echo"<tr><th>ADDRESS</th><td>".$arr['address']."</td></tr><";
            echo"<tr><th>REG DATE</th><td>".$arr['regdate']."</td></tr><";
            echo"</table><br><br></center>";
            echo"<center><a href='studentlogin.php'>LOGIN AGAIN</a></center>";
    }
}

echo"<br><br><br><br><footer align='center'>&copy; All Rights Reserved,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<a href='#' align='right' title='CONTACT US' style='text-decoration: none;'><img src='image/contact.png' alt='CONTACT US' style='width: 50px;height: 50px;'>
</a></footer>";
die(mysqli_error($con));

?>











                    


                   




                               