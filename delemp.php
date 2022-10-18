<?php

$con=mysqli_connect("localhost","root","","hostel");

if(!$con)
{
    die("connection failed".mysqli_error($con));
}

echo"<html>
<head>
<title>DELETE EMPLOYEE</title>
</head>
<body style='background-image:linear-gradient(to right,rgba(28, 182, 67, 0.473),rgba(0, 255, 21, 0.74));'>
        <h3 align='center'    style='font-size: xx-large;
        font-family: system-ui;
        font-weight: 900;'>DELETE EMPLOYEE</h3>
        <ul style='margin-left: 700px;'>
        <a href='empdetails.php' style='text-decoration: none;'><img src='image/left-arrow.png' alt='BACK' title='BACK' style='width: 50px;height: 50px;padding-left:50px;'><b>BACK</b></a>
        <a href='adminmain.php' style='text-decoration: none;'><img src='image/home.png' title='HOME' alt='HOME'  style='width: 50px;height: 50px;padding-left:50px;'><b>HOME</b></a>
        <a href='index.php' style='text-decoration: none;'><img src='image/exit.png' alt='LOGOUT' title='LOGOUT' style='width: 50px;height: 50px; padding-left:50px;'><b>LOG OUT</b></a>    
        </ul>
    <center>
    <form action='delemp.php' method='post' class='delempform'  >
    <img src='image/profile.png' title='EMPLOYEE NAME' alt='EMPLYOEE NAME'  align='center' style='width: 50px;height: 50px;'>
    <input type='text' name='ename' placeholder='EMPLOYEE NAME' ><br><br><br>
    <img src='image/school-bag.png' title='EMPLOYEE JOB' alt='EMPLYOEE JOB' style='width: 50px;height: 50px;'>
    <input type='text' name='ejob' placeholder='EMPLOYEE JOB' ><br><br><br>
    <button type='submit' name='submmit' value='' style='width: 50px;height: 50px;background-color:Cyan;margin:0%;padding:0%;border:0px;'>
    <img src='image/delete.png' alt='SUBMIT' title='DDELETE' style='width: 50px;height: 50px;'></button>
    </form></center>
</body>
<style>
.delempform
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

$ename=$_POST['ename'] ?? '';
$ejob=$_POST['ejob'] ?? '';

$q="SELECT * FROM employee";
$res=mysqli_query($con,$q);
if($q)
{
    
    if(mysqli_num_rows($res)>0)
    {
        echo"<center><table border size=4 class='emptable'>";
        echo"<tr><th>EXSTING EMPLOYEE NAMES</th><th>JOB</th>";
        while($ar=mysqli_fetch_assoc($res))
        {
            echo"<tr><td>".$ar['ename']."</td><td>".$ar['ejob']."</td>";
        }
        echo"</table><br><br>";
    }
    else
    {
        echo"<center><table border size=1><th>CRRENTLY NO EMPLOYEE DETAILS FOUND</th></table></center><br>";
    }
    
}

$sql1="SELECT * FROM employee WHERE ename='$ename' AND ejob='$ejob'";
$result1=mysqli_query($con,$sql1);
if(mysqli_num_rows($result1)>0 && !empty($ename))
{
    $sql2="DELETE FROM employee WHERE ename='$ename' AND ejob='$ejob'";
    $result2=mysqli_query($con,$sql2);
    if($result2)
    {
        echo"<center>EMPLOYEE DELETED<br><table border size=1 class='emptable'><tr><th>EMPLYOEE NAME</th><td>".$ename."</td></tr><tr><th>EMPLYOEE JOB</th><td>".$ejob."</td></tr></table></center>";
        header("Refresh:3 URL=delemp.php");
    }
}
else
{
   if(!empty($ename) && !empty($ejob))
   {
    echo"<center><b>NO EMPLOYEE DETAILS MATCHED</b> </centre>";
   }
}

echo"<br><br><br><br><footer align='center'>&copy; All Rights Reserved,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<a href='#' align='right' title='CONTACT US' style='text-decoration: none;'><img src='image/contact.png' alt='CONTACT US' style='width: 50px;height: 50px;'>
</a></footer>";

die(mysqli_error($con));

?> 