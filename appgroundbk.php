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
        $sql="select *from ground where status='-'";
        $row=mysqli_query($con,$sql);
    
        if(mysqli_num_rows($row)==0)
        {
            include("a_menubar.php");
            echo "<script>alert('No data found!!!!!!');</script>";
        }
        else
        {
            include("a_menubar.php");
        }
?>
    
        <body>
            <div id="viewtable" class="table-responsive" style="background:url('./images/banner_5.jpg');">
                <h2><center>Approve ground Booking's</center></h2>
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
                                <th><center>Approve</center></th>
                                <th><center>Disapprove</center></th>
                            </tr>
                        <thead>

                        <?php
                            while($res=mysqli_fetch_array($row))
                            {
                                $name=$res['name'];
                                $email=$res['email'];
                                $contact=$res['contact'];
                                $purpose=$res['purpose'];
                                $from=$res['fromdate'];
                                $to=$res['todate'];
                                $amount=$res['amount'];
                                
                                echo "
                                <tbody bgcolor='#f6f6f6'>
                                    <tr align='center'>
                                        <td width='15%'>$name</td>                
                                        <td width='15%'>$email</td>                   
                                        <td width='15%'>$contact</td>                    
                                        <td width='15%'>$purpose</td>                    
                                        <td width='15%'>$from</td>                   
                                        <td width='15%'>$to</td>                   
                                        <td width='15%'>$amount</td>                    
                                        <td width='15%'><a href='allow.php?val=".$res['gid']."' class='btn btn-success btn-sm'>Approve</a></td>                   
                                        <td width='15%'><a href='disallow.php?val=".$res['gid']."' class='btn btn-success btn-sm'>Disapprove</a></td>
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