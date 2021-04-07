<?php
     session_start();
     $uid = ! empty($_SESSION['uid']) ? $_SESSION['uid'] : ' ' ;
     if($uid==" ")
     {
         echo "<script>window.location.href='index.php';</script>";
     }
     else
     {
        $con=mysqli_connect('localhost','root','','ccm');
        $sql="select *from ground where status='Approved'";
        $row=mysqli_query($con,$sql);
        if(mysqli_num_rows($row)==0)
        {
            echo "<script>alert('No data found!!!!!');</script>";
        }
        else
        {
            include("a_menubar.php");
        }
?>

    <body>
        <div id="viewground" class="table-responsive" style="background:url('./images/banner_5.jpg');">
            <h2><center>Approved ground Booking</center></h2>
            <center>
            <table class="table table-hover" style="width:80%; margin-bottom:150px;">
                <thead style="color:white; background:#424146; text-align:center;">
                    <tr>
                        <th><center>Name</center></th>
                        <th><center>Email</center></th>
                        <th><center>Contact</center></th>
                        <th><center>Purpose</center></th>
                        <th><center>From</center></th>
                        <th><center>To</center></th>
                        <th><center>Amount</center></th>
                        <th><center>Status</center></th>
                    </tr>
                </thead>
                    <?php
                        while($res=mysqli_fetch_array($row))
                        {
                            $name=$res['name'];
                            $email=$res['email'];
                            $contact=$res['contact'];
                            $purpose=$res['purpose'];
                            $fromdate=$res['fromdate'];
                            $todate=$res['todate'];
                            $amount=$res['amount'];
                            $status=$res['status'];

                            echo "
                            <tbody bgcolor='#f6f6f6'>
                                <tr align='center'>
                                    <td width='15%'>$name</td>
                                    <td width='15%'>$email</td>
                                    <td width='15%'>$contact</td>
                                    <td width='15%'>$purpose</td>
                                    <td width='15%'>$fromdate</td>
                                    <td width='15%'>$todate</td>
                                    <td width='15%'>$amount</td>
                                    <td width='15%'>$status</td>
                                </tr>
                            </tbody>
                                ";
                        }
                    ?>

            </table>
            </center>
        </div>
        <?php
            include("footer.php");
        ?>
    </body>
</html>

<?php
    }   
?>