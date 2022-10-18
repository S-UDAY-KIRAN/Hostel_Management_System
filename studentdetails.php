<?php

$con=mysqli_connect("localhost","root","","hostel");

if(!$con)
{
    die("connection failed".mysqli_error($con));
}
    echo"
    <body style='background-image:linear-gradient(to right,rgba(28, 182, 67, 0.473),rgba(0, 255, 21, 0.74));'>
    <h3 align='center'    style='font-size: xx-large;
    font-family: system-ui;
    font-weight: 900;'>STUDENT DETAILS</h3>
    <ul>
    <a href='delstudent.php' style='text-decoration: none;' ><img src='image/delete.png' alt='DELETE STUDENT' title='DELETE STUDENTS' style='width: 50px;height: 50px;padding-left:50px;'><b>DELETE</b></a>
    <a href='adminmain.php' style='text-decoration: none;' ><img src='image/left-arrow.png' alt='BACK' title='BACK' style='width: 50px;height: 50px;margin-left: 550px;padding-left:40px;'><b>BACK</b></a>
    <a href='adminmain.php' style='text-decoration: none;'><img src='image/home.png' title='HOME' alt='HOME'  style='width: 50px;height: 50px;padding-left:40px;'><b>HOME</b></a>
    <a href='index.php' style='text-decoration: none;'><img src='image/exit.png' alt='LOGOUT' title='LOGOUT' style='width: 50px;height: 50px; padding-left:45px;'><b>LOG OUT</b></a>    
    
    </ul>
    <center>
    <form action='studentdetails.php' method='post' class='stdform'>
    <img src='image/profile.png' title='STUDENT NAME' alt='STUDENT NAME'  align='center' style='width: 50px;height: 50px;'>
    <input type='text' name='sname' placeholder='STUDENT NAME'><br/><br>
    <button type='submit' name='submmit' value='' style='width: 50px;height: 50px;background-color:Cyan;margin:0%;padding:0%;border:0px;'>
    <img src='image/loupe.png' alt='SUBMIT' title='SEARCH' style='width: 50px;height: 50px;'></button>
    </form></center>
    <style>
.stdform
    {
        background-color:cyan;
        margin-left: 400px;
        margin-right: 400px;
        padding-top: 10px;
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
    </body>";

$sname=$_POST['sname'] ?? '';
$roomno=$_POST['roomno'] ?? '';

$q="SELECT * FROM student ORDER BY roomno";
$res=mysqli_query($con,$q);

$sql="SELECT * FROM student  WHERE sname='$sname'";
$result=mysqli_query($con,$sql);


if($q)
{
    
    if(mysqli_num_rows($res)>0)
    {
        echo"<center><table border size=4 class='emptable'>";
        echo"<tr><th>EXSTING STUDENTS</th><th>ROOM NO</th>";
        while($ar=mysqli_fetch_assoc($res))
        {
            echo"<tr><td>".$ar['sname']."</td><td>".$ar['roomno']."</td>";
        }
        echo"</table><br><br>";     
    }
    else
    {
        echo"<center><table border size=2 class='emptable'><th><b>CRRENTLY NO STUDENT DETAILS FOUND</b></th></table></center><br>";
    }   
}
if($result)
{
        if(mysqli_num_rows($result)>0)
        {
            echo"<center><b>STUDENT DETAILS</b><br><table border size=2 class='emptable'>";
            echo"<tr><th>STUDENT NAME</th><th>ROOM NO</th><th>PHONE NO</th><th>COURSE</th><th>COLLEGE</th><th>ADDRESS</th><th>REG DATE</th>";
            while($arr=mysqli_fetch_assoc($result))
            {
                echo"<tr><td>".$arr['sname']."</td>";
                echo"<td>".$arr['roomno']."</td>";
                echo"<td>".$arr['phone']."</td>";
                echo"<td>".$arr['course']."</td>";
                echo"<td>".$arr['college']."</td>";
                echo"<td>".$arr['address']."</td>";
                echo"<td>".$arr['regdate']."</td></tr>";
            }
            echo"</table><br><br></center>";
            
        
        }
        else
        {
            if(!empty($sname))
            {
                echo"<center><table border size=1 class='emptable'>NO STUDENT EXIST WITH THE NAME&nbsp;".$sname."</table></center>";
                echo"<br><br><center><a href=studentreg.php>PLEASE REGISTER</a></center>";
            }

        }
}


echo"<br><br><center>
<footer align='center'>&copy; All Rights Reserved,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<a href='#' align='right' title='CONTACT US' style='text-decoration: none;'><img src='image/contact.png' alt='CONTACT US' style='width: 50px;height: 50px;'>
</a></footer></center>";
die(mysqli_error($con));

?>

<a href='delstudent.php' style='text-decoration: none;'>DELETE STUDENT</a>