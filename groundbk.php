<?php
    session_start();
    $uid= ! empty($_SESSION['uid']) ? $_SESSION['uid'] : ' ';

    if($uid==' ')
    {
        echo "<script>window.location.href='index.php';</script>";
    }
    else
    {
        include("u_menubar.php");
?>
    <body>
        <div class="container-fluid" style="background:transparent url('images/banner_5.jpg') no-repeat center center /cover; padding: 60px 0 40px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="ground" style="background:#636e72; width:650px; margin: auto;">
                        <form action="" method="POST">
                            <table style="margin: auto; line-height:42px; color:white;">
                                <tr>
                                    <td><h1 style="text-align:center;">Ground Booking</h1></td>
                                </tr>
                                <tr>
                                    <td>name</td>   
                                </tr>
                                <tr>
                                    <td><input style="width:300px; outline:none; border-radius:6px; border:none; color:black;" type="text" name="name" value="<?php if(isset($_POST['name'])) {echo $_POST['name'];} ?>" pattern="[a-zA-Z' ']{1,20}" title="Enter valid name" required></td>
                                    
                                    <!--name input tag has pattern and title so data input is authenticate and easy-->

                                    <!--print data in input tag beacause two submit button is used after 1st data is gone so use this way-->
                                </tr>
                                <tr>
                                    <td>email</td>
                                </tr>
                                <tr>
                                    <td><input style="width:300px; outline:none; border-radius:6px; border:none; color:black;" type="text" name="email" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];} ?>" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="Enter valid Email" required></td>
                                </tr>
                                <tr>
                                    <td>contact</td>
                                </tr>
                                <tr>
                                    <td><input style="width:300px; outline:none; border-radius:6px; border:none; color:black;" type="text" name="contact" value="<?php if(isset($_POST['contact'])) {echo $_POST['contact'];} ?>" pattern="[0-9]{10}" title="Enter conatct number" required></td>
                                </tr>
                                <tr>
                                    <td>purpose</td>
                                </tr>
                                <tr>
                                    <td><input style="width:300px; outline:none; border-radius:6px; border:none; color:black;" type="text" name="purpose" value="<?php if(isset($_POST['purpose'])) {echo $_POST['purpose'];} ?>" required></td>
                                </tr>
                                <tr>
                                    <td>From</td>
                                </tr>
                                <tr>
                                    <td><input style="width:300px; outline:none; border-radius:6px; border:none; color:black;" type="date" name="from" value="<?php if(isset($_POST['from'])) {echo $_POST['from'];} ?>"></td>
                                </tr>
                                <tr>
                                    <td>To</td>
                                </tr>
                                <tr>
                                    <td><input style="width:300px; outline:none; border-radius:6px; border:none; color:black;" type="date" name="to" value="<?php if(isset($_POST['to'])) {echo $_POST['to'];} ?>"></td>

                                    <!--type="date" is used to show calender in page-->

                                </tr>
                                <tr>
                                    <td style="padding:30px 90px;"><input style="width:100px; background-color:#32ff7e; outline:none; border:none; border-radius:8px;" type="submit" name="calculate" value="calculate"></td>
                                </tr>
                                <?php
                                if(isset($_POST['calculate']))      //if calculate button  is pressed then php script is run
                                {
                                $from=strtotime($_POST['from']);    //here strtotime is used to convert time into timeslap
                                $to=strtotime($_POST['to']);        //since 1970 seconds is found and then devide by 1 days total second's and = days
                                $days=($to-$from)/60/60/24;
                                $price=2000;
                                $total=$days*$price;
                                ?>
                                        <!-- here validation is done
                                            the date is enter by user is hold after see that calculation date is changed or not
                                            so store in hidden form as in input tag -->

                                    <input type="hidden" name="from1" value="<?php echo $_POST['from']; ?>">    
                                    <input type="hidden" name="to1" value="<?php echo $_POST['to']; ?>">
                                    <tr>
                                    <td>amount</td>
                                    </tr>
                                    <tr>
                                    <td><input style="width:300px; outline:none; border-radius:6px; border:none; color:black;" type="text" name="amount" value="<?php echo $total ?>"></td>
                                    </tr>   
                                    <tr>
                                    <td style="padding:30px 100px;"><input style="width:80px; background-color:#32ff7e; outline:none; border:none; border-radius:8px;" type="submit" name="submit"></td>
                                    </tr> 
                                <?php
                                }
                                ?>
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
    $sql="select max(gid) as max from ground";
    $row=mysqli_query($con,$sql);
    $res=mysqli_fetch_array($row);
    $gid=$res['max']+1;

    $name=$_POST['name'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $purpose=$_POST['purpose'];
    $from=$_POST['from'];
    $to=$_POST['to'];
    $amount=$_POST['amount'];
    $from1=$_POST['from1'];         //previous hidden date is stored in variable
    $to1=$_POST['to1'];

        if($from!=$from1 || $to!=$to1)  //here actualy validation work
        {
            echo"<script>alert('Data is changed...please calculate amount again');</script>";
        }
        else
        {
            $sql="insert into ground values($gid,'$name','$email',$contact,'$purpose','$from','$to',$amount,'-')";
            if(mysqli_query($con,$sql))
            {
                echo "<script>alert('Ground booking details send to admin for approval');</script>";
                echo "<script>window.location.href='groundbk.php';</script>";
            }
        }
    }
?>

<?php
    }
?>