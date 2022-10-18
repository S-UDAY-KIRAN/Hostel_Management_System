<?php

$con=mysqli_connect("localhost","root","","hostel");

if(!$con)
{
    die("connection failed".mysqli_error($con));
}
 
echo"<html>
<head>
    <title>EMPLYOEE DETAILS</title>
</head>
<body style='background-image:linear-gradient(to right,rgba(28, 182, 67, 0.473),rgba(0, 255, 21, 0.74));'>
<h3 align='center' style='font-size: xx-large; font-family: system-ui; font-weight: 900;'>EMPLYOEE DETAILS</h3>
    <ul align='right' style='padding-left: 5px;'>
    <a href='addemp.php' style='text-decoration: none;'><img src='image/add-user.png' alt='ADD NEW EMPLOYEE' title='ADD NEW EMPLOYEE' style='width: 50px;height: 50px;'><b>ADD EMPLOYEE</b></a>
    <a href='delemp.php' style='text-decoration: none;'><img src='image/delete.png' alt='DELETE EXISTING EMPLOYEE' title='DELETE EXISTING EMPLOYEE' style='width: 50px;height: 50px;padding-left:25px;'><b>DELETE EMPLOYEE</b></a>
    <a href='adminmain.php' style='text-decoration: none;'><img src='image/left-arrow.png' alt='BACK' title='BACK' style='width: 50px;height: 50px;margin-left:375px;'><b>BACK</b></a>
    <a href='adminmain.php' style='text-decoration: none;''><img src='image/home.png' alt='HOME' title='HOME' style='width: 50px;height: 50px;padding-left:25px;'><b>HOME</b></a>
    <a href='index.php' style='text-decoration: none;'><img src='image/exit.png' alt='LOG OUT' title='LOG OUT' style='width: 50px;height: 50px;padding-left:25px;'><b>LOG OUT</b></a>
    </ul>
    <center>
    <form action='empdetails.php' method='post' class='form'>
    <img src='image/profile.png' title='EMPLOYEE NAME' alt='EMPLYOEE NAME'  align='center' style='width: 50px;height: 50px;'>
    <input type='text' name='ename' placeholder='EMPLOYEE NAME'><br/>
    <br><button type='submit' name='submmit' value='' style='width: 50px;height: 50px;background-color:Cyan;margin:0%;padding:0%;border:0px;'>
    <img src='image/loupe.png' alt='SUBMIT' title='SEARCH' style='width: 50px;height: 50px;'></button>
    </form></center><br><br>
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
    .form input
    {
        width: 200;
    }
    .table
    {
        background-color:Aqua;
    } 
    .table th
    {
        background-color:Tomato;
    }
    </style>
    </html>";

$q="SELECT * FROM employee";
$res=mysqli_query($con,$q);
if($q)
{
    
    if(mysqli_num_rows($res)>0)
    {
        echo"<center><table border size=4 class='table'>";
        echo"<tr><th>EXSTING EMPLOYEE NAMES</th><th>JOB</th>";
        while($ar=mysqli_fetch_assoc($res))
        {
           if(!empty($ar['ejob']))
           {
            echo"<tr><td>".$ar['ename']."</td><td>".$ar['ejob']."</td>";
           }
        }
        echo"</table><br><br>";
    }
    else
    {
        echo"<center><table border size=4 class='table'><th><b>CRRENTLY NO EMPLOYEE DETAILS FOUND</b></th></table></center><br>";
    }
    
}

$ename=$_POST['ename'] ?? '';

$sql="SELECT * FROM employee WHERE ename='$ename'";
$result=mysqli_query($con,$sql);


if($result && !empty($ename))
{
        if(mysqli_num_rows($result)>0)
        {
            echo"<center><b>EMPLOYEE DETAILS</b><br><table border size=4 class='table'>";
            echo"<tr><th>EMPLYOEE NAME</th><th>JOB</th><th>PHONE NO</th><th> ADDRESS</th>";
            while($arr=mysqli_fetch_assoc($result))
            {
                echo"<tr><td>".$arr['ename']."</td>";
                echo"<td>".$arr['ejob']."</td>";
                echo"<td>".$arr['ephno']."</td>";
                echo"<td>".$arr['eaddress']."</td></tr>";
            }
            echo"</table><br><br></center>";
        }
        else
        {
            if(!empty($ename))
            {
                echo"<center><table border size=1 class='table'><th><b>NO EMPLOYEE EXIST WITH THE NAME&nbsp;".$ename."</b></th></table></center>";
             }

        }
}
echo"<br><br><center>
<footer align='center'>&copy; All Rights Reserved,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<a href='#' align='right' title='CONTACT US' style='text-decoration: none;'><img src='image/contact.png' alt='CONTACT US' style='width: 50px;height: 50px;'>
</a></footer>";
die(mysqli_error($con));
?>