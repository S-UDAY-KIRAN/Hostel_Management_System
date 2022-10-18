<?php

$con=mysqli_connect("localhost","root","","hostel");

if(!$con)
{
    die("connection failed".mysqli_error($con));
}

echo"<html>
<head>
    <meta name='viewport' content='width=device-width'>
    <title>HOSTEL MANAGEMENT</title>
</head>
<body align='center' style='background-image:linear-gradient(to right,rgba(28, 182, 67, 0.473),rgba(0, 255, 21, 0.74));'>

    <div id='grad'>
    <h3 align='center'    style='font-size: xx-large;
    font-family: system-ui;
    font-weight: 900;
    margin-bottom: 0px;
    padding-bottom: 10px;'>HOSTEL MANAGEMENT PAGE</h3>
    </div>
    <div style='margin-left: 750px;'>
    <ul style='text-decoration: none;list-style:none;color: brown;font-weight: 900;'>
           <a href='adminlogin.php' style='text-decoration: none;'><img src='image/login.png' alt='ADMIN LOGIN' title='ADMIN LOGIN' style='width: 50px;height: 50px;'><b>ADMIN LOGIN</b></a>
           <a href='studentlogin.php' style='text-decoration: none;margin-left: 60px;'><img src='image/profile.png' alt='STUDENT LOGIN' title='STUDENT LOGIN' style='width: 50px;height: 50px;margin-left:20px;'><b>STUDENT LOGIN</b></a>
    </ul>
    </div>
    <footer align='center'>&copy; All Rights Reserved,&nbsp;&nbsp; <a href='contactus.php' title='CONTACT US' style='text-decoration: none;'><img src='image/contact.png' alt='CONTACT US' style='width: 50px;height: 50px;'></a> </footer>

<style>
    grad
    {
        background-image:linear-gradient(to right,rgba(255,0,0,0),rgba(255,0,0,1));
    }
    img {
            width:100%;
            height:100%;
        }
</style>
</body>
</html>";
?>