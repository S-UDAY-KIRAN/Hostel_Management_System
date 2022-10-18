<?php


$con=mysqli_connect("localhost","root","","hostel");

if(!$con)
{
    die("connection failed".mysqli_error($con));
}

echo"<html>
<head>
<title>CONTACT US</title>
</head>
<body style='background-image:linear-gradient(to right,rgba(28, 182, 67, 0.473),rgba(0, 255, 21, 0.74));'>
<h3 align='center'style='font-size: xx-large;
    font-family: system-ui;
    font-weight: 900;
    margin-top: 60px;'>
    CONTACT US
</h3>


    
   
<form action='contactus.php' class='form'  method='post' align='center' >
        <img src='image/profile.png' title='NAME' alt='NAME'  align='center' style='width: 50px;height: 50px;'>
        <input type='text' name='name' placeholder='NAME' ><br><br><br>
        <img src='image/email.png' title='EMAIL' alt='EMAIL'  align='center' style='width: 50px;height: 50px;'>
        <input type='text' name='email' placeholder='email' ><br><br><br>
        <img src='image/writing.png' title='YOUR QUESTION' alt='YOUR QUESTION'  align='center' style='width: 50px;height: 50px;'>
        <input type='text' name='help' placeholder='How Can We Help You!' id='contact' style='height: 186px;padding-bottom: 132px;'><br><br><br>
        <button type='submit' name='submit' value='' style='width: 50px;height: 50px;background-color:Cyan;margin:0%;padding:0%;border:0px;'>
        <img src='image/arrow-right.png' alt='SUBMIT' title='SUBMIT' style='width: 50px;height: 50px;'></button>
</form>
</body>
<style>
    .form
    {
        background-color:cyan;
        margin-left: 450px;
        margin-right: 450px;
    }
    .addempform input
    {
        width: 200;
    }
    </style>

</html>";


$name=$_POST['name'] ?? '';
$email=$_POST['email'] ?? '';
$help=$_POST['help'] ?? '';

$sql="INSERT INTO contactus VALUES('$name','$email','$help')";
$result=mysqli_query($con,$sql);

if($result && !empty($email) && !empty($help))
{
    echo"<center><b>We Recieved Your Message</b></center>";
    header("Refresh:2 URL=index.php");
  
}
die(mysqli_error($con));
?>


  