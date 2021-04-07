<?php
    $membertype=$_GET['membertype'];
    //here membertypr i.e value of tag is 

    if($membertype=='Active Member')
    {
        echo "
                <tr>
                    <td>Amount for Membership</td>
                </tr>
                <tr>
                    <td>
                        <input style='width:300px; height:40px; outline:none; border-radius:6px; border:none; color:black;' type='text' name='amount' value='40000'>
                    </td>
                </tr>    
            ";
    }
    if(($membertype=='Active Member Prime'))
    {
        echo " 
                <tr>
                    <td>Amount for Membership</td>
                </tr>
                <tr>
                    <td>
                        <input style='width:300px; height:40px; outline:none; border-radius:6px; border:none; color:black;' type='text' name='amount' value='50000'>
                    </td>
                </tr>
            ";
    }
?>