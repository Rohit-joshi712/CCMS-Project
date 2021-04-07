<?php
    session_start();
?>
<html>
    <head>   
        <title>Cricket Club Mangement</title>
        <meta charset="utf-8">
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
                </ul>
                </div>
            </div>
        </nav>
    
        <body background='images/banner_4.jpg'>
        <div class="container">
        <br><br><br><br><br><br><br><br>
            <div class="login">
                <form action="" method="POST">
            
                    <table style="background:black; width: 25%; height: 300px; position: relative; left:150px;">
                        <tr style="font-size:30px; ">
                            <td style="color:#fff; weight:100%;  padding: 20px 0px 10px 90px;">Login</td>
                        </tr>
                        <tr>
                            <td><input style="width:200px; height:30px; margin: 10px 40px; outline:none;" type="text" name="email" placeholder="Email" required></td>
                        </tr>
                        <tr>
                            <td><input style="width:200px; height:30px; margin: 10px 40px; outline:none;" type="password" name="password" placeholder="password"></td>
                        </tr>
                        <tr>
                            <td><input style="color:white; height: 40px; padding: 0 15px; border-radius: 10px; margin: 7px 0px 0px 90px; background-color:#32ff7e; outline:none; border:none;" type="submit" name="submit"></td>
                        </tr>
                        <tr>
                            <td style="padding: 0px 50px; font-size:15px; "><a style="text-decoration: none; color:black;" href="register.php">Register</a></td>
                        </tr>
                        <tr>
                        <td><a style="color:#fff; text-decoration:none; margin: 100px;" href="register.php">Register</a></td>
                        </tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                    </table>
                </form>
            </div>   
        </div>
    </body>
</html>
<?php
    if(isset($_POST['submit']))
    {
        $con=mysqli_connect('localhost','root','','ccm');
        $email=$_POST['email'];
        $password=$_POST['password'];

        $sql="select *from user where email='$email' and password='$password'";
        $result=mysqli_query($con,$sql);
       
        if($res=mysqli_fetch_array($result))
        {
            $_SESSION['uid']=$res['uid'];
            if($res['role'])
                echo "<script>window.location.href='addnotice.php';</script>";
            else
                echo "<script>window.location.href='notice.php';</script>";
        }
        else
        {
            echo "<script>alert('Invalid username and password');</script>";
        }
    }
?>