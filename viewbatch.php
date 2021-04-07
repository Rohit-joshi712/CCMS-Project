
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
        $row=mysqli_query($con,"select *from batch");
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
        <div id="viewbatch" class="table-responsive" style="background:url('./images/banner_5.jpg');">
        <h2><center>Batch Registration</center></h2>
            <center>
            <table class="table table-hover" style="width:80%; margin-bottom:150px;">
                <thead style="color:white; background:#424146; text-align:center;">
                    <tr>
                        <th><center>Name</center></th>
                        <th><center>Email</center></th>
                        <th><center>Contact</center></th>
                        <th><center>Batch</center></th>
                        <th><center>Batch Time</center></th>
                        <th><center>Start Date</center></th>
                        <th><center>End Date</center></th>
                        <th><center>Amount</center></th>
                    </tr>
                </thead>
                    <?php
                        while($res=mysqli_fetch_array($row))
                        {
                            $name=$res['name'];
                            $email=$res['email'];
                            $contact=$res['contact'];
                            $batch=$res['batch'];
                            $batchtime=$res['batchtime'];
                            $startdate=$res['startdate'];
                            $enddate=$res['enddate'];
                            $amount=$res['amt'];

                            echo "
                                <tbody bgcolor='#f6f6f6'>
                                    <tr align='center'>
                                        <td>$name</td>
                                        <td>$email</td>
                                        <td>$contact</td>
                                        <td>$batch</td>
                                        <td>$batchtime</td>
                                        <td>$startdate</td>
                                        <td>$enddate</td>
                                        <td>$amount</td>
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