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
    font-weight: 900;'>ROOM DETAILS</h3>
        <ul align='right'>
        <a href='studentmain.php' style='text-decoration: none;'><img src='image/left-arrow.png' alt='BACK' title='BACK' style='width: 50px;height: 50px;'><b>BACK</b></a>
        <a href='studentmain.php' style='text-decoration: none;'><img src='image/home.png' title='HOME' alt='HOME'  style='width: 50px;height: 50px;margin-left:50px;'><b>HOME</b></a>
        <a href='index.php' style='text-decoration: none;'><img src='image/exit.png' alt='LOGOUT' title='LOGOUT' style='width: 50px;height: 50px;margin-left:50px;'><b>LOG OUT</b></a>    
        </ul>
        <center><form action='sroomdetails.php' method='post' class='fee'>
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
    </body>";

$room=$_POST['roomno'] ?? '';


$sql="SELECT * FROM student S,rooms R WHERE R.roomnum=S.roomno AND roomnum='$room' ORDER BY roomno";
$result=mysqli_query($con,$sql);


if($result)
{
    if($row=mysqli_num_rows($result)>0)
      {
        echo"<center><table border size=1 class='table'>";
        echo"<tr><th>STUDENT NAME</th><th>ROOM NO</th><th>CURRENT CAPACITY</th><th>TOTAL CAPACITY</th>";
                while($arr=mysqli_fetch_assoc($result))
                {
                    echo"<tr><td>".$arr['sname']."</td>";
                    echo"<td>".$arr['roomnum']."</td><td>".$arr['currcap']."</td><td>".$arr['totalcap']."</td></tr>";
                }
                echo"</table><br><br></center>";
                
    }
    else
    {
        if(!empty($room))
        {
        echo"<center><table border size=1><th>NO ROOM DETAILS EXISTS WITH ROOM NO &nbsp".$room."</th></table></center><br>";
        }
    }
}   

echo"<br><br><center>
<footer align='center'>&copy; All Rights Reserved,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<a href='#' align='right' title='CONTACT US' style='text-decoration: none;'><img src='image/contact.png' alt='CONTACT US' style='width: 50px;height: 50px;'>
</a></footer></center>";
die(mysqli_error($con));

?>

