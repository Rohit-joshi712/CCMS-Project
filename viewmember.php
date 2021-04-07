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
        $row=mysqli_query($con,"select *from member");
        if(mysqli_num_rows($row)==0)
        {
            echo "<script>alert('No data found!!!!!');<script>";
        }
        else
        {
            include("a_menubar.php");
        }
?>
    <body>
        <div id="viewmember" class="table-responsive" style="background:url('./images/banner_5.jpg');">
            <h2><center>Member Registration</center></h2>
            <center>
            <table class="table table-hover" style="width:80%; margin-bottom:150px;">
                <thead style="color:white; background:#424146; text-align:center;">
                    <tr>
                        <th><center>Name</center></th>
                        <th><center>Email</center></th>
                        <th><center>Contact</center></th>
                        <th><center>Address</center></th>
                        <th><center>Date of birth</center></th>
                        <th><center>Categary</center></th>
                        <th><center>Cost</center></th>
                    </tr>
                </thead>
                    <?php
                        while($res=mysqli_fetch_array($row))
                        {
                            $name=$res['mname'];
                            $email=$res['email'];
                            $contact=$res['contact'];
                            $address=$res['address'];
                            $dob=$res['dob'];
                            $catg=$res['catg'];
                            $amt=$res['amount'];

                            echo "
                                <tbody bgcolor='#f6f6f6'>
                                    <tr align='center'>
                                        <td>$name</td>
                                        <td>$email</td>
                                        <td>$contact</td>
                                        <td>$address</td>
                                        <td>$dob</td>
                                        <td>$catg</td>
                                        <td>$amt</td>
                                    </tr>
                                </thead>
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