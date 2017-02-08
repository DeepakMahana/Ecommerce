<br><br>

<h2 style="text-align:center; color:Red;">Do You Really Want To DELETE Your Account ?</h2>

<form action="" method="post" align="center">
<br> 
    
<img src="../images/deleteacc.png" width="100" height="100"><br> 
    
    
<input type="submit" name="yes" value="Yes I Want" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="no" value="No I Was Kidding" />    
</form>

<?php
include("C:/wamp/www/BookBerry/includes/db.php");

$user = $_SESSION['customer_email'];

if(isset($_POST['yes'])){
    $delete_customer = "delete from customers where customer_email='$user'";
    $run_customer = mysqli_query($con,$delete_customer);
    echo"<script>alert('We Are Really Sorry, Your Account Has Been Deleted !')</script>";
    echo"<script>window.open('../index.php','_self')</script>";
}

if(isset($_POST['no'])){
    echo"<script>alert('Good ! We Are Happy!')</script>";
    echo"<script>window.open('my_account.php','_self')</script>";
}
?>