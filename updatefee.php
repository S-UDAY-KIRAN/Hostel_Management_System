<?php

$con=mysqli_connect("localhost","root","","hostel");

if(!$con)
{
    die("connection failed".mysqli_error($con));
}

echo"<html>
<head>
<title>UPDATE FEE DETAILS</title>
</head>
<body style='background-image:linear-gradient(to right,rgba(28, 182, 67, 0.473),rgba(0, 255, 21, 0.74));'>
<h3 align='center'    style='font-size: xx-large;
font-family: system-ui;
font-weight: 900;'>UPDATE FEE DETAILS</h3>
<ul align='right'>
<a href='fee.php' style='text-decoration: none;' ><img src='image/left-arrow.png' alt='BACK' title='BACK' style='width: 50px;height: 50px;margin-left: 500px;padding-left:40px;'><b>BACK</b></a>
<a href='adminmain.php' style='text-decoration: none;'><img src='image/home.png' title='HOME' alt='HOME'  style='width: 50px;height: 50px;padding-left:40px;'><b>HOME</b></a>
<a href='index.php' style='text-decoration: none;'><img src='image/exit.png' alt='LOGOUT' title='LOGOUT' style='width: 50px;height: 50px; padding-left:45px;'><b>LOG OUT</b></a>    
</ul>
    <center>
    <center>
    <form action='updatefee.php' method='post' align='center'class='form'>
    <img src='image/profile.png' title='STUDENT NAME' alt='STUDENT NAME'  align='center' style='width: 50px;height: 50px;'>
    <input type='text' name='sname' placeholder='STUDENT NAME' style='width: 200px;'><br><br>
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
    <img src='image/money.png' title='FEE PAID' alt='FEE PAID'  align='center' style='width: 50px;height: 50px;'>
    <input type='text' name='feepaid' placeholder='FEE PAID' style='width: 200px;'><br><br>
    <button type='submit' name='submmit' value='' style='width: 50px;height: 50px;background-color:Cyan;margin:0%;padding:0%;border:0px;'>
    <img src='image/forward.png' alt='UPDATE' title='UPDATE' style='width: 50px;height: 50px;'></button><br><br>
    </form></center>
</body>
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
$roomno=$_POST['roomno'] ?? '';
$feepaid=$_POST['feepaid'] ?? '';


$sql1="SELECT sname,roomno,due FROM student,fee WHERE sname='$sname' AND roomno='$roomno' AND student.sname=fee.stname AND student.roomno=fee.stroomno ";
$result1=mysqli_query($con,$sql1);
if($result1  && !empty($sname) && !empty($roomno))
{
    if(mysqli_num_rows($result1)>0)
    {
        while($arr1=mysqli_fetch_assoc($result1))
        {
            $due=2000-$feepaid;
            $due=$due+$arr1['due'];
            $sql3="UPDATE fee SET feepaid='$feepaid',due='$due' WHERE stname='$sname' AND stroomno='$roomno'";
            $result3=mysqli_query($con,$sql3);
            if($result3)
            {
                echo"FEE  UPDATED";
            }
        }
    }
    else
    {
        $sql2="SELECT sname,roomno FROM student WHERE sname='$sname' AND roomno='$roomno'";
        $result2=mysqli_query($con,$sql2);
        if($result2  && !empty($sname) && !empty($roomno))
        {
            if(mysqli_num_rows($result2)>0)
            {
                while($arr2=mysqli_fetch_assoc($result2))
                {
                    $due=2000-$feepaid;
                    $sql5="INSERT INTO fee(stname,stroomno,feepaid,due) VALUES ('$sname','$roomno','$feepaid','$due')";
                    $result5=mysqli_query($con,$sql5);
                    if($result5)
                    {
                        echo"<center><table border size=1><th>FEE UPDATED</th></center><br><br>";
                    }
                }
            }
            else
            {
                echo"<center><table border size=1><th>&nbsp NO STUDENT EXIST WITH NAME &nbsp".$sname."&nbsp IN ROOM NO &nbsp".$roomno."</th></table></center>";
                exit;
            }
        }
    }    
}

$sql4="SELECT * FROM fee WHERE stname='$sname' AND stroomno='$roomno'";
$result4=mysqli_query($con,$sql4);
if($result4 && !empty($sname) && !empty($roomno))
{   
    echo"<center><table border size=1 class='table'>";
    echo"<tr><th>STUDENT NAME</th><th>ROOM NO</th><th>FEE PAID </th><th>DUE FEE</th></tr>";
    while($arr4=mysqli_fetch_assoc($result4))
    {   
        echo"<tr><td>".$arr4['stname']."</td>";
        echo"<td>".$arr4['stroomno']."</td>";
        echo"<td>".$arr4['feepaid']."</td>";
        echo"<td>".$arr4['due']."</td></tr>";
    }
    echo"</table><br><br></center>";
    
}

echo"<center > <footer align='center' style='margin-top: 150px;margin-bottom: 50px;'>&copy; All Rights Reserved,&nbsp;&nbsp; 
<a href='contactus.php' align='right'title='CONTACT US' style='text-decoration: none;'><img src='image/contact.png' alt='CONTACT US' style='width: 50px;height: 50px;'>
</a></footer></center>";
die(mysqli_error($con));

?>