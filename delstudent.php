<?php

$con=mysqli_connect("localhost","root","","hostel");

if(!$con)
{
    die("connection failed".mysqli_error($con));
}

echo"<html>
<head>
<title>DELETE STUDENT</title>
</head>
<body style='background-image:linear-gradient(to right,rgba(28, 182, 67, 0.473),rgba(0, 255, 21, 0.74));'>
<h3 align='center'    style='font-size: xx-large;
font-family: system-ui;
font-weight: 900;'>DELETE STUDENT</h3>
<ul style='margin-left: 700px;'>
<a href='studentdetails.php' style='text-decoration: none;'><img src='image/left-arrow.png' alt='BACK' title='BACK' style='width: 50px;height: 50px;padding-left:50px;'><b>BACK</b></a>
<a href='adminmain.php' style='text-decoration: none;'><img src='image/home.png' title='HOME' alt='HOME'  style='width: 50px;height: 50px;padding-left:50px;'><b>HOME</b></a>
<a href='index.php' style='text-decoration: none;'><img src='image/exit.png' alt='LOGOUT' title='LOGOUT' style='width: 50px;height: 50px; padding-left:50px;'><b>LOG OUT</b></a>    
</ul>
    <center>
    <div class='delstdform'>
    <form action='delstudent.php' method='post'>
    <img src='image/profile.png' title='STUDENT NAME' alt='STUDENT NAME'  align='center' style='width: 50px;height: 50px;'>
    <input type='text' name='sname' placeholder='STUDENT NAME' style='width:200px;'><br><br><br>
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
    <button type='submit' name='submmit' value='' style='width: 50px;height: 50px;background-color:Cyan;margin:0%;padding:0%;border:0px;'>
    <img src='image/delete.png' alt='SUBMIT' title='DELETE' style='width: 50px;height: 50px;'></button><br><br><br>
    </form>
    </div>
    </center>
</body>
<style>
.delstdform
    {
        background-color:cyan;
        margin-left: 400px;
        margin-right: 400px;
        padding-top:10px;
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
$roomno=$_POST['roomno'] ?? '';

$q="SELECT * FROM student";
$res=mysqli_query($con,$q);
if($q)
{
    
    if(mysqli_num_rows($res)>0)
    {
        echo"<center><table border size=1 class='emptable'>";
        echo"<tr><th>EXSTING STUDENTS</th><th>ROOM NUMBER</th>";
        while($ar=mysqli_fetch_assoc($res))
        {
            echo"<tr><td>".$ar['sname']."</td><td>".$ar['roomno']."</td>";
        }
        echo"</table><br><br>";
    }
    else
    {
        echo"<center><table border size=1 class='emptable'><th><b>CRRENTLY NO STUDENT DETAILS FOUND<b></th></table></center><br>";
    }
    
}

$sql1="SELECT * FROM student WHERE sname='$sname' AND roomno='$roomno'";
$result1=mysqli_query($con,$sql1);
if(mysqli_num_rows($result1)>0 && !empty($sname))
{
    $sql2="DELETE FROM student WHERE sname='$sname' AND roomno='$roomno'";
    $result2=mysqli_query($con,$sql2);
    if($result2)
    {
        echo"<center>STUDENT DELETED<br><table border size=1 class='emptable'><tr><th>STUDENT NAME</th><td>".$sname."</td></tr><tr><th>ROOM NUMBER</th><td>".$roomno."</td></tr></table></center>";
        $sql3="UPDATE rooms SET currcap=currcap-1 WHERE roomnum='$roomno'";
        $result3=mysqli_query($con,$sql3);
        if($result3)
        {
            header("Refresh:5 URL=delstudent.php");
        }
    }
}
else
{
   if(!empty($ename) && !empty($ejob))
   {
    echo"<center><table border size=1 class='emptable'><th><b>CRRENTLY NO STUDENT  DETAILS MATCHED <b></th></table></center><br>";
   }
}

echo"<br><br><br><br><footer align='center'>&copy; All Rights Reserved,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<a href='#' align='right' title='CONTACT US' style='text-decoration: none;'><img src='image/contact.png' alt='CONTACT US' style='width: 50px;height: 50px;'>
</a></footer>";

die(mysqli_error($con));

?> 