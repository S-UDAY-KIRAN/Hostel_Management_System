<?php

$con=mysqli_connect("localhost","root","","hostel");

if(!$con)
{
    die("connection failed".mysqli_error($con));
}
 
echo"
<html>
<head>
    <title>FEE DETAILS</title>
</head>
<body style='background-image:linear-gradient(to right,rgba(28, 182, 67, 0.473),rgba(0, 255, 21, 0.74));'>
    <center><h3 align='center'    style='font-size: xx-large;
    font-family: system-ui;
    font-weight: 900;'>FEE DETAILS</h3></center>
    <div>
<ul style='margin-top: 00px;margin-bottom: 00px;'>
    <a  href='updatefee.php'  style='text-decoration: none;'>
    <img src='image/forward.png' alt='UPDATE FEE DETAILS' title='UPDATE FEE DETAILS' style='width: 50px;height: 50px;'>
    <b>UPDATE FEE DETAILS</b></a>
    <a href='adminmain.php' style='text-decoration: none;' ><img src='image/left-arrow.png' alt='BACK' title='BACK' style='width: 50px;height: 50px;margin-left: 500px;'><b>BACK</b></a>
    <a href='adminmain.php' style='text-decoration: none;margin-left: 25px;'><img src='image/home.png' alt='HOME' title='HOME' style='width: 50px;height: 50px;margin-left:40px;'><b>HOME</b></a>
    <a href='index.php' style='text-decoration: none ;margin-left: 25px;'><img src='image/exit.png' alt='LOG OUT' title='LOG OUT' style='width: 50px;height: 50px;margin-left:40px;'><b>LOG OUT</b></a>
    </ul>
    </div>
<div>
    <center><form action='fee.php' method='post' class='fee'>
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
    <img src='image/loupe.png' alt='SUBMIT' title='SEARCH' style='width: 50px;height: 50px;'></button>
    </form><br><br></div>
    </center>
   
</body>
<style>
.fee
{
    background-color:Cyan;
    margin-left: 400px;
    margin-right: 400px ;
    padding-bottom: 10px ;
    padding-top: 10px ;
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
</html></center>";


$roomno=$_POST['roomno'] ??'';


$sql="SELECT * FROM fee WHERE stroomno='$roomno' ORDER BY stroomno";
$result=mysqli_query($con,$sql);

if($result)
{
        if(mysqli_num_rows($result)>0)
        {
            echo"<center><b>STUDENT DETAILS</b><br><table border size=.7 class='table'>";
            echo"<tr><th>STUDENT NAME</th><th> ROOM NO </th><th>FEE PAID</th><th>FEE DUE</th>";
            while($arr=mysqli_fetch_assoc($result))
            {
                echo"<tr><td>".$arr['stname']."</td>";
                echo"<td>".$arr['stroomno']."</td>";
                echo"<td>".$arr['feepaid']."</td>";
                echo"<td>".$arr['due']."</td></tr>";  
            }
            echo"</table><br><br></center>";
            
        }
        else
        {
            if(!empty($roomno))
                {
                    echo"<center style='font-weight: bolder;'><table  border size=1><th>NO FEE RECORDS FOUND WITH ROOM NUMBER&nbsp;".$roomno."</th></table></center>";
                }

        }
}
 

echo"<br><br><br><br><footer align='center'>&copy; All Rights Reserved,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<a href='contactus.php' align='right' title='CONTACT US' style='text-decoration: none;'><img src='image/contact.png' alt='CONTACT US' style='width: 50px;height: 50px;'>
</a></footer>";

die(mysqli_error($con));
?>

