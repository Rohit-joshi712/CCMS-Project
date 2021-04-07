<?php
        $con=mysqli_connect('localhost','root','','ccm');
?>

<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <title>Cricket Club Mangement</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>     
    </head>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <a style="font-size:25px; padding-left:90px;" class="navbar-brand" href="#">Cricket Club Management</a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                <ul class="nav navbar-nav" style="font-size: 16px;">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="userlogin.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    

    <body background='images/banner_5.jpg'>
        <div class="register" style="position:relative; width: 700px; margin:50px auto; background: #636e72;">
            <form method="POST" action=" ">
                <table style="position:relative; margin:auto;">
                    <tr>
                        <td><h1 style="color:#fff;">&nbsp&nbsp&nbsp&nbspRegistration</h1></td>
                    </tr>
                    <tr>
                        <td style="font-size:18px; color:#fff; font-weight:lighter; padding:10px 0;">Name :</td>
                    </tr>
                    <tr>
                        <td><input style="width:300px; height:35px; outline:none; border-radius:6px; border:none; color:black;" type="text" name="name" required></td>
                    </tr>
                    <tr>
                        <td style="font-size:18px; color:#fff; font-weight:lighter; padding:10px 0;">Email :</td>
                    </tr>
                    <tr>
                        <td><input style="width:300px; height:35px; outline:none; border-radius:6px; border:none; color:black;" type="text" name="email" required></td>
                    </tr>
                    <tr>
                        <td style="font-size:18px; color:#fff; font-weight:lighter; padding:10px 0;">Contact :</td>
                    </tr>
                    <tr>
                        <td><input style="width:300px; height:35px; outline:none; border-radius:6px; border:none; color:black;" type="number" name="contact" required></td>
                    </tr>
                    <tr>
                    <td style="font-size:18px; color:#fff; font-weight:lighter; padding:10px 0;">Password :</td>
                    </tr>
                    <tr>
                    <td><input style="width:300px; height:35px; outline:none; border-radius:6px; border:none; color:black;" type="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td><input style="width:100px; height:40px; margin:30px 80px; background:#32ff7e; outline:none; border:none; border-radius:10px; color:#fff; font-size:16px;" type="submit" id="submit" name="submit"></td>
                    </tr>
                </table>


                <?php
                if(isset($_POST['submit']))
                {
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $contact=$_POST['contact'];
                    $password=$_POST['password'];

                    $var="select max(uid) as max from user";        //increse id by find max id 
                    $row=mysqli_query($con,$var);
                    $res=mysqli_fetch_assoc($row);
                    $uid=$res['max']+1;

                    $evalidate=mysqli_query($con,"select email from user"); //check if email already in system
                    while($data=mysqli_fetch_array($evalidate))
                    {
                        if($data['email']==$email)
                        {
                            $emailerror=1;
                        }
                    }
                    if($emailerror==1)
                    {
                        echo "<script>alert('Email is already given please choose another');</script>";
                        echo "<script>location.replace('register.php');</script>";
                    }
                    else
                    {
                        $sql="insert into user values($uid,'$name','$email',$contact,'$password',0)";
                    
                        if(mysqli_query($con,$sql))
                        {
                            echo "<script>alert('Registered succesfully');</script>";
                            echo "<script>location.replace('register.php');</script>";     //here in javascript refer to that page
                        }
                    }
                }
                ?>

            </form>
        </div>
    </body>
</html>


