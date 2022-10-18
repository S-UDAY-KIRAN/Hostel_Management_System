<?php

$con=mysqli_connect("localhost","root","","hostel");

if(!$con)
{
    die("connection failed".mysqli_error($con));
}

echo"<body class='body' style='background-image:linear-gradient(to right,rgba(28, 182, 67, 0.473),rgba(0, 255, 21, 0.74));'>
<div>
<h3 align='center'>STUDENT LOGIN</h3>
</div>
<div>
<ul style='margin-top: 00px;margin-bottom: 00px;'> 
<a href='studentreg.php' style='text-decoration: none;'><img src='image/add-user.png' alt='REGISTER HERE' title='NEW REGISTRATION' style='width: 50px;height: 50px;margin-left: 10px;'><b>REGISTER</b></a>   
<a href='index.php' style='text-decoration: none;'><img src='image/left-arrow.png' alt='BACK' title='BACK' style='width: 50px;height: 50px;margin-left: 700px;padding-left:50px;'><b>BACK</b.</a>
<a href='index.php' style='text-decoration: none;margin-left: 25px;'><img src='image/home.png' alt='HOME' title='HOME' style='width: 50px;height: 50px;padding-left:50px;'><b>HOME</b></a>
</ul></div><br>
<div>
<center>
<form action='#' method='post' class='studentloginform'>
<img src='image/profile.png' alt='STUDENT NAME' title='STUDENT NAME/USERNAME' align='center' style='width: 50px;height: 50px;'>
<input type='text' name='sname' placeholder='STUDENT NAME'><br/><br>
<img src='image/key.png' alt='PASSWORD'  align='center' title='PASSWORD' style='width: 50px;height: 50px;'>
<input type='password' name='password' placeholder='PASSWORD'><br/><br>
<button type='submit' name='submmit' value='' style='width: 50px;height: 50px;background-color:Cyan;margin:0%;padding:0%;border:0px;'>
<img src='image/arrow-right.png' alt='SUBMIT' title='LOGIN' style='width: 50px;height: 50px;'></button>
</form></center></div>
<style>
.studentloginform
{
    background-color:Cyan;
    margin-left: 400px;
    margin-right: 400px ;
    padding-bottom: 10px ;
    padding-top: 10px ;
}
.ul
{
    list-style:none;
}
.body ul a
{
    align:right;
}

</style>
</body>
</html>
";

$sname=$_POST['sname'] ?? '';
$password=$_POST['password'] ?? '';

$sql="SELECT * FROM student WHERE sname='$sname'";
$result=mysqli_query($con,$sql);



if($result && !empty($password) && !empty($sname))
{
   $row=mysqli_num_rows($result);
   $arr=mysqli_fetch_assoc($result);
   if($row>0)
   {
       if($arr['password'] === $password)
       {
        header("Location:studentmain.php");
       }
       else
        {
            if(!empty($password) && !empty($sname))
            {
                echo"<center>WRONG PASSWORD <br>LOGIN AGAIN</center>";
            }
        }
   }
   else
   {
       if(!empty($password) && !empty($sname))
       {
        echo"<center>NO RECORDS FOUND<br></center>";
       }
   }
}
echo"<br><br><center> <footer align='center'>&copy; All Rights Reserved,&nbsp;&nbsp; 
<a href='#' align='right'title='CONTACT US' style='text-decoration: none;'><img src='image/contact.png' alt='CONTACT US' style='width: 50px;height: 50px;'>
</a></footer></center>";


die(mysqli_error($con));
?>



