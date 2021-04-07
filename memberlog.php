<?php
    session_start();
    $uid= empty($_SESSION['uid']) ? ' ' : $_SESSION['uid'];
    if($uid==' ')
    {
        echo "<script>window.location.href='index.php';</script>";
    }
    else
    {
        include("u_menubar.php");
?>

<html>
    <head>
        <title>MemberShip Registration</title>
        <link type="text/css" rel="stylesheet" href=".\css\u_menubar.css"/>
        
        <!--link jquery file to use javascript library -->
        <script>
            function duration()
            {

                /* here javascript function used to insert amount.php file in html page
                   dynamicaly so no need to load full page DOM is used from javascript
                */
                var xhttp;
                xhttp = new XMLHttpRequest();               //object is created
                xhttp.onreadystatechange = function ()      //for every time status change in object this function is execute
                                           {
                                                if(xhttp.readyState == 4 && xhttp.status == 200)
                                                {
                                                    //at intended position value from other page is printed
                                                    document.getElementById("add").innerHTML=xhttp.responseText;
                                                    //responceText is print that file content as string
                                                }
                                           };
                var membertype=document.getElementById("membertype").value;
                xhttp.open("GET","amount.php?membertype="+ membertype,true);
                //another file name and varible= assign value from script and for that file provide html element of this file as GET method
                xhttp.send();      
            }
        </script>
    </head>
    <body>
        <div class="container-fluid" style="background:transparent url('images/banner_5.jpg') no-repeat center center /cover; padding: 60px 0 40px 0;">            
            <div class="row">
                <div class="com-md-12">
                    <div class="member" style="background:#636e72; width:650px; margin: auto;">
                        <form action="" method="POST">
                            <h1 style="padding:60px 0 0 120px; color:white;">Membership Registration</h1>
                            <table style="line-height:42px; color:white; margin:30px 180px;">
                                <tr>
                                    <td>Name</td>
                                </tr>
                                <tr>
                                    <td><input style="width:300px; outline:none; border-radius:6px; border:none; color:black;" type="text" name="name" value="<?php if(isset($_POST['name'])) {echo $_POST['name'];} ?>" pattern="[a-zA-Z' ']{1,20}" title="Enter alphabets only" required></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                </tr>
                                <tr>
                                    <td><input style="width:300px; outline:none; border-radius:6px; border:none; color:black;" type="text" name="email" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];} ?>" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="Enter valid Email" required></td>
                                </tr>
                                <tr>
                                    <td>Contact</td>
                                </tr>
                                <tr>
                                    <td><input style="width:300px; outline:none; border-radius:6px; border:none; color:black;" type="text" name="contact" value="<?php if(isset($_POST['contact'])) {echo $_POST['contact'];} ?>" pattern="[0-9]{10}" title="Enter number only" required></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                </tr>
                                <tr>
                                    <td><input style="width:300px; outline:none; border-radius:6px; border:none; color:black;" style="width:300px; height: 70px; font-size:15px; padding:0; " type="text" name="address" value="<?php if(isset($_POST['address'])) {echo $_POST['address'];} ?>" pattern="[a-zA-Z0-9' ']{,100}" title="Not use special symbol" required></textarea></td>
                                </tr>
                                <tr>
                                    <td>Date of birth</td>
                                </tr>
                                <tr>
                                    <td><input style="width:300px; outline:none; border-radius:6px; border:none; color:black;" type="date" name="date" value="<?php if(isset($_POST['date'])) {echo $_POST['date'];} ?>"required></td>
                                </tr>
                                <tr>
                                    <td>Categary of membership</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select style="width:300px; height:40px; outline:none; border-radius:6px; border:none; color:black;" type="text" id="membertype" name="membertype" onchange="duration()" required >
                                        <!-- function is called according change in this tag-->
                                            <?php
                                                if(isset($_POST['membertype']))
                                                {
                                                    echo "<option>".$_POST['membertype']."<option>";
                                                    //here default option seen as first so use php to set as previously
                                                }
                                            ?>
                                            <option value="">--select membership--</option>       <!--here value is set for select is not set as option -->
                                            <option>Active Member</option>
                                            <option>Active Member Prime</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><div class="amount" id="add"></div></td>
                                    <!-- this div is create is for print amount at this place dynamic change using javascript -->
                                </tr>
                                <tr>
                                    <td style="padding:30px 100px;"><input style="width:80px; background-color:#32ff7e; outline:none; border:none; border-radius:8px;" type="submit" name="submit"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>   
        </div>
        <?php
            include("footer.php");
        ?>
    </body>
</html>

    <?php
    if(isset($_POST['submit']))
    {
        $con=mysqli_connect('localhost','root','','ccm');
        $sql="select max(mid) as max from member LIMIT 1";
        $row=mysqli_query($con,$sql);
        $res=mysqli_fetch_array($row);
        $mid=$res['max']+1;

        $mname=$_POST['name'];
        $email=$_POST['email'];
        $contact=$_POST['contact'];
        $address=$_POST['address'];

        $dob=date("d-m-yy",strtotime($_POST['date']));
        $catg=$_POST['membertype'];
        $amount=$_POST['amount'];

        $sql="insert into member values($mid,'$mname','$email','$contact','$address','$dob','$catg',$amount)";
        if(mysqli_query($con,$sql))
        {
            echo "<script>alert('Registartion done succesfully');</script>";
            echo "<script>window.location.href='memberlog.php';</script>";
            //here windows,location is used as windows.location then data is in form still hold
        }
    }
    ?>

<?php
    }
?>