<?php
	session_start();
	$uid = ! empty($_SESSION['uid']) ? $_SESSION['uid'] : ' ' ;
	if($uid==' ')
	{
		echo "<script>window.location.href='index.php';</script>";
	}
	else
	{
		include("u_menubar.php");
?>
								<!--  here data is fetch from notice table
								  it has 2 rows like id,notice 
								  just to show latest notice from table  -->

	<body>
		<div class="container-fluid" style="background:transparent url('images/banner_5.jpg') no-repeat center center /cover; padding: 140px;">
			<div id="middle">
				<table class="bg-primary" style="width: 400px; margin:auto; background:#636e72;">
					<tr>
						<td style="text-align:center; padding:30px 0; font-size:30px;">Notice</td>                    
					</tr>
					<tr style="text-align:center; background:#636e72;">
						<td style="padding: 50px; font-size: 18px; font-weight: lighter;">
							<?php
								$con=mysqli_connect('localhost','root','','ccm');
								$sql="select *from notice order by nid desc limit 1";		//here only one row is show from database i.e LIMIT 1;
								$row=mysqli_query($con,$sql);
								if(mysqli_num_rows($row)==0)					//check that if any row is found or not!!!!!!!!!!!!!!
								{
									echo "<script>alert('No data found!!!!!')</script>";
								}
								else
								{
									$res=mysqli_fetch_array($row);
									$notice=$res['notice'];
									echo "<marquee>$notice</marquee>";					//in this page no need to submit data so no hyperlink is needed.
								}
							?>						
						</td>
					</tr>
				</table>
			</div>
		</div>

		<?php
			include("footer.php");
		?>
	</body>
</html>

<?php	
	}
?>




