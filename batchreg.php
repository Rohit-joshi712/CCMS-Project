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
                    <div class="batchreg" style="background:#636e72; width:650px; margin: auto;">
                        <form action="" method="POST">
                            <table style="margin: auto; line-height:42px; color:white;">
                                <tr>
                                    <td><h1 style="text-align:center;">Batch Booking</h1></td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                </tr>
                                <tr>
                                    <td><input style="width:300px; outline:none; border-radius:6px; border:none; color:black;" type="text" name="name" value="<?php if(isset($_POST['name'])) {echo $_POST['name'];} ?>" pattern="[a-zA-Z' ']{5,20}" title="Enter alphabets only" required></td>
                                </tr>
                                <tr>
                                    <td>Email-id</td>
                                </tr>
                                <tr>
                                    <td><input style="width:300px; outline:none; border-radius:6px; border:none; color:black;" type="text" name="email" value="<?php  if(isset($_POST['email'])) {echo $_POST['email'];} ?>" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="Enter an email-id" required></td>
                                </tr>
                                <tr>
                                    <td>Contact</td>
                                </tr>
                                <tr>
                                    <td><input style="width:300px; outline:none; border-radius:6px; border:none; color:black;" type="text" name="contact" value="<?php if(isset($_POST['contact'])) {echo $_POST['contact'];} ?>" pattern="[0-9]{10,10}" title="Enter ten digit only" required></td>
                                </tr>
                                <tr>
                                    <td>Batch type</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select style="width:300px; height:40px; outline:none; border-radius:6px; border:none; color:black;" name="batchtype" required>      
                            <!-- select not have value attribute so print in that select box 
                            we write php code which print in that select box 
                            as a 1st option which is seen by default but it not print it
                            "smart work"!!!!!!!!!!!!!!!! -->
                                            <?php
                                                if(isset($_POST['batchtype']))
                                                {
                                                    echo "<option>".$_POST['batchtype']."<option>";
                                                }
                                            ?>
                                            <option value="">--select option--</option>
                                            <option>Regular</option>
                                            <option>Vacation</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Batch timing</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select style="width:300px; height:40px; outline:none; border-radius:6px; border:none; color:black;" name="batchtiming" required>
                                            <?php
                                                if(isset($_POST['batchtiming']))
                                                {
                                                    echo "<option>".$_POST['batchtiming']."<option>";
                                                }
                                            ?>
                                            <option value="">--select option--</option>
                                            <option>7:00AM - 11:00AM</option>
                                            <option>4:00PM - 7:00PM</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Start date</td>
                                </tr>
                                <tr>
                                    <td><input style="width:300px; outline:none; border-radius:6px; border:none; color:black;" type="date" name="start" value="<?php if(isset($_POST['start'])) {echo $_POST['start'];} ?>" required></td>
                                </tr>
                                <tr>
                                    <td style="padding:30px 100px;"><input style="background-color:#32ff7e; outline:none; border:none; border-radius:8px;" type="submit" value="Calculate" name="calculate"></td>
                                </tr>
                                
                                <?php
                                if(isset($_POST['calculate']))
                                {
                                    $batch=$_POST['batchtype'];
                                    $start=$_POST['start'];
                                    
                                    if($batch=='Regular')
                                    {
                                /*  here strtotime function convet string into seconds 
                                    then make a date using date() fonction 1st parameter is "d-m-yy" (or it will be "y-m-d" i.e reverse way)
                                    then add $number of days and again covert into date() format and stored.
                                */
                                        $end= date("d-m-yy",strtotime(date("d-m-yy",strtotime($start))."+ 365 days"));
                                        $amount= 10000;
                                    }
                                    else
                                    {
                                        $end=date("d-m-yy",strtotime(date("d-m-yy",strtotime($start))."+ 90 days"));
                                        $amount= 4000;
                                    }
                                ?>

                                <!-- previous date before calculate button is stored for validation -->

                                <input type="hidden" name="validstart" value="<?php echo $start; ?>">
                                <tr>
                                    <td>End date</td>
                                </tr>
                                <tr>
                                    <td><input style="width:300px; outline:none; border-radius:6px; border:none; color:black;" type="text" name="end" value="<?php echo $end; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Amount</td>
                                </tr>
                                <tr>
                                    <td><input style="width:300px; outline:none; border-radius:6px; border:none; color:black;" type="text" name="amt" value="<?php echo $amount; ?>"></td>
                                </tr>
                                <tr>
                                    <td style="padding:30px 100px;"><input style="width:80px; background-color:#32ff7e; outline:none; border:none; border-radius:8px;" name="submit" type="submit" value="Join" ></td>
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
if(isset($_POST['submit']))
{
$con=mysqli_connect('localhost','root','','ccm');

$sql="select max(bid) as max from batch";
$row=mysqli_query($con,$sql);
$res=mysqli_fetch_array($row);
$bid=$res['max']+1;

$name=$_POST['name'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$batch=$_POST['batchtype'];
$batchtime=$_POST['batchtiming'];

$start=$_POST['start']; 

/*  date in $enddate = d-m-yy
    but in $startdate = y-m-d which is default way the <input> tag gives output
    so use $start for convert date y-m-d to d-m-yy in $startdate 
*/

$startdate=date("d-m-yy",strtotime($_POST['start']));
$enddate=$_POST['end'];
$amt=$_POST['amt'];
$validstart=$_POST['validstart'];   /*  here $_POST['start'] is stored previous date for validation we use it
                                        for checking "startdate" is not changed 
                                        in $validstart = value in y-m-d format
                                        so $start is used for comparizan
                                    */

if($start!=$validstart)             /*so $start is used for comparizan */
{
echo "<script>alert('Dont be so smart!!!!!!');</script>";
}
else
{
    $sql="insert into batch values($bid,'$name','$email','$contact','$batch','$batchtime','$startdate','$enddate',$amt)";
    if(mysqli_query($con,$sql))
    {
        echo "<script>alert('batch registartion details send to admin for approval');</script>";
        echo "<script>window.location.href='batchreg.php';</script>";
    }
}
}
    include("footer.php");
?>
    </body> 
</html>

<?php
    }
?>