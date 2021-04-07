<?php
	session_start();
	$uid = ! empty($_SESSION['uid']) ? $_SESSION['uid'] : ' ' ;
	if($uid==" ")
	{
		echo "<script>window.location.href='index.php';</script>";
	}
	else
	{
        include("a_menubar.php");
?>
    <body>
		<div class="container-fluid" style="background:transparent url('images/banner_5.jpg') no-repeat center center /cover; padding: 100px;">
            <div id="addnotice">
                <form action="" method="POST">
                    <table class="bg-primary" style="width: 500px; margin:auto; text-align:center; background:#636e72;">
                        <tr>
                            <td style="text-align:center; padding:30px 0; font-size:30px;">Add Notice</td>                    
                        </tr>
                        <tr>
                            <td style="padding: 0 160px 15px 0;";>Content of notice</td>
                        </tr>
                        <tr>
                            <td><textarea style="color:black; border-radius:10px; font-size: 16px;" name="notice" cols="40" rows="8" ></textarea></td>
                        </tr>
                        <tr>
                            <td><input style="margin:20px; width:100px; height:40px; background-color:#32ff7e; outline:none; border:none; border-radius:8px;" type="submit" name="submit"></td>
                        </tr>
                    </table>
                </div>
            </form>
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
        $row=mysqli_query($con,"select max(nid) as max from notice");
        $res=mysqli_fetch_array($row);
        $nid=$res['max']+1;

        $notice=$_POST['notice'];

        $sql="insert into notice values($nid,'$notice')";
        if(mysqli_query($con,$sql))
        {
            echo "<script>alert('Notice added succesfully!!!!!!');</script>";
            echo "<script>window.location.href='addnotice.php';<script>";
        }
    }
?>

<?php
}
?>