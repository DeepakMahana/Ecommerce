<style>

#table{
    margin-left: 300px;
        
    }



</style>

<div id="table">
<form action="" method="post">
    
    <table align="center" width="500" cellspacing="20" bgcolor="skyblue">
   
    <tr>
        <td align="center" colspan="5"><b><h2>Change Your Password</h2></b><br></td>
    </tr> 
        
    <tr>
        <td align="center" colspan="5"><img src="../images/changepass.png" width="100" height="100"><br></td>
    </tr> 
        
    <tr align="right">
        <td align="left"><b>Enter Current Password :</b></td>
        <td><input type="password" name="current_pass" required><br></td>
    </tr>  
        
    <tr align="right">
        <td align="left"><b>Enter New Password :</b></td>
        <td><input type="password" name="new_pass" required><br></td>
    </tr> 
        
    <tr align="right">    
        <td align="left"><b>Enter New Password Again : </b></td>
        <td align="right"><input type="password" name="new_pass_again" required><br></td>
    </tr>
    
    <tr align="center"><td colspan="8">    
        <input type="submit" name="change_pass" value="Change Password"/></td></tr>
    
    </table>    
</form> 
</div>
    
<?php
include("C:/wamp/www/BookBerry/includes/db.php");

if(isset($_POST['change_pass'])){
    $user = $_SESSION['customer_email'];
    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $new_again = $_POST['new_pass_again'];
    
    $sel_pass = "select * from customers where customer_pass='$current_pass' AND customer_email='$user'";
    
    $run_pass = mysqli_query($con, $sel_pass);
    $check_pass = mysqli_num_rows($run_pass);
    
    if($check_pass==0){
        echo"<script>alert('Your Current Password is Wrong !')</script>";
        exit();
     }
    
    if($new_pass!=$new_again){
        echo"<script>alert('New Password Do Not Match !')</script>";
        exit();
    }
    else {
        $update_pass = "update customers set customer_pass='$new_pass' where customer_email='$user'";
        $run_update = mysqli_query($con, $update_pass);
        echo"<script>alert('Your Password Updated Successfully !')</script>";
        echo"<script>window.open('my_account.php','_self')</script>";
    }

}
?>
