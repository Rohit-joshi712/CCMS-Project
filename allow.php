<?php
    $con=mysqli_connect('localhost','root','','ccm');
    $gid=$_GET['val'];
    
    $sql="update ground set status='Approved' where gid='$gid'";
    if(mysqli_query($con,$sql))
    {
        echo "<script>alert('Approved succesfully');</script>";
        echo "<script>location.replace('appgroundbk.php');</script>";
    }
?>