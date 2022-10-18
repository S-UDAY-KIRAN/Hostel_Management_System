<?php

$con=mysqli_connect("localhost","root","","hostel");

if(!$con)
{
    die("connection failed". mysqli_error($con));
}
 echo"
<html>
<head>
    <title>ADMIN LOGIN</title>
</head>
<body style='background-image:linear-gradient(to right,rgba(28, 182, 67, 0.473),rgba(0, 255, 21, 0.74)); margin-top: 0px;margin-bottom: 0px;margin-right: 0px;margin-left: 0px;'>
    <h3 align='center'    style='font-size: xx-large;
    font-family: system-ui;
    font-weight: 900;'>ADMIN LOGIN</h3>
    <div>
<ul style='margin-left: 850px;margin-top: 00px;'>    
<a href='index.php' style='text-decoration: none;'><img src='image/left-arrow.png' alt='BACK' title='BACK' style='width: 50px;height: 50px;margin-right:20px;'><b>BACK</b></a>
<a href='index.php' style='text-decoration: none;margin-left: 25px;'><img src='image/home.png' alt='HOME' title='HOME' style='width: 50px;height: 50px;padding-left: 20px;'><b>HOME</b></a>
</ul></div>
<div>
<center>
<form action='adminlogin.php' method='post' class='studentloginform'>
<img src='image/profile.png' alt='ADMIN NAME' title='ADMIN USERNAME' align='center' style='width: 50px;height: 50px;'>
<input type='text' name='admin' placeholder='ADMIN NAME'><br/><br>
<img src='image/key.png' alt='PASSWORD'  align='center' title='PASSWORD' style='width: 50px;height: 50px;'>
<input type='password' name='password' placeholder='PASSWORD'><br/><br>
<button type='submit' name='submmit' value='' style='width: 50px;height: 50px;background-color:Cyan;margin:0%;padding:0%;border:0px;'>
<img src='image/arrow-right.png' alt='SUBMIT' title='LOGIN' style='width: 50px;height: 50px;'></button>
</form></center></div>
    </body>
    <style>
    .studentloginform
{
    background-color:Cyan;
    margin-left: 400px;
    margin-right: 400px ;
    padding-top: 10px;
}
    </style>
    ";

$admin=$_POST['admin'] ?? '';
$password=$_POST['password'] ?? '';

$sql="SELECT * FROM admin WHERE admin='$admin'";
$result=mysqli_query($con,$sql);

if($result)
{
   $row=mysqli_num_rows($result);
   $arr=mysqli_fetch_assoc($result);
   if($row>0)
   {
        if($arr['admin']===$admin)
        {
            if($arr['password']===$password)
            {
                header("Location:adminmain.php");
            }
            else
            {
                if(!empty($password))
                {  
                echo"<center>WRONG PASSWORD<br><a href='adminlogin.php>LOGIN AGAIN</a></center>";
                echo" <center style='margin-top: 200px;'> <footer align='center' style='margin-top: 150px;margin-bottom: 50px;'>&copy; All Rights Reserved,&nbsp;&nbsp; 
                <a href='#' align='right'title='CONTACT US' style='text-decoration: none;'><img src='image/contact.png' alt='CONTACT US' style='width: 50px;height: 50px;'>
                </a></footer></center>";
                die(mysqli_error($con));
                }
            }
        }
   }
   else
   {
      if(!empty($admin) && !empty($password))
      {   
       echo"<center>WRONG USERNAME<br><a href='adminlogin.php>LOGIN AGAIN</a></center>";
       echo"<center > <footer align='center' style='margin-top: 150px;margin-bottom: 50px;'>&copy; All Rights Reserved,&nbsp;&nbsp; 
       <a href='#' align='right'title='CONTACT US' style='text-decoration: none;'><img src='image/contact.png' alt='CONTACT US' style='width: 50px;height: 50px;'>
       </a></footer></center>";
       die(mysqli_error($con));
      }
   }

}
echo"<center > <footer align='center' style='margin-top: 150px;margin-bottom: 50px;'>&copy; All Rights Reserved,&nbsp;&nbsp; 
<a href='#' align='right'title='CONTACT US' style='text-decoration: none;'><img src='image/contact.png' alt='CONTACT US' style='width: 50px;height: 50px;'>
</a></footer></center>";
die(mysqli_error($con));

?>