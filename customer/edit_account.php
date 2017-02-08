<!doctype html>

<?php
include("C:/wamp/www/BookBerry/includes/db.php");

$user = $_SESSION['customer_email'];
$get_customer = "select * from customers where customer_email='$user'";  
$run_customer = mysqli_query($con, $get_customer);
$row_customer = mysqli_fetch_array($run_customer); 

$c_id = $row_customer['customer_id'];
$name = $row_customer['customer_name'];
$email = $row_customer['customer_email'];
$pass = $row_customer['customer_pass'];
$address = $row_customer['customer_address'];
$country = $row_customer['customer_country'];
$contact = $row_customer['customer_contact'];
$image = $row_customer['customer_image'];

?>

<html> 
    
<style>
    #table{
        margin-left: 200px;
    }    

</style>    

<body>    
    
<div id="table">
<form action="" method="post" enctype="multipart/form-data">
<table align="center" width="600" cellspacing="10" bgcolor="skyblue">
    
<tr><td colspan="6" align="center"><h2>Update Your Account</h2></td></tr>
    
<tr>
    <td align="center" colspan="5"><img src="../images/accountupd.jpg" width="100" height="100"><br></td>
</tr>     

<tr>
<td>Customer Name:</td>
<td><input type="text" name="c_name" value="<?php echo $name; ?>"   required/></td>    
</tr>  

    <tr>
<td>Customer Email:</td>
<td><input type="text" name="c_email" value="<?php echo $email; ?>" required/></td>    
</tr>  
    
    <tr>
<td>Customer Password:</td>
<td><input type="password" name="c_pass" value="<?php echo $pass; ?>" required/></td>    
</tr> 
    
    <tr>
<td>Customer Image:</td>
<td><input type="file" name="c_image"/><img src="customer_images/<?php echo $image; ?>" width="100px" height="100px" align="right" /></td>    
</tr>  
    
    
    <tr>
<td>Customer Address</td>
<td><input type="text" name="c_address" value="<?php echo $address; ?>" required /></td>    
</tr>  
    
<tr>
<td>Customer Country:</td>
<td><select name="c_country" disabled>
    <option><?php echo $country; ?></option>
    <option>India</option>
    <option>US</option>
    <option>UK</option>
    <option>France</option>
    <option>Nepal</option>
    </select></td>    
</tr>      
    
<tr>
<td>Customer Contact:</td>
<td><input type="text" name="c_contact" value="<?php echo $contact; ?>" required/></td>    
</tr>  
    
<tr align="center">
<td colspan="4"><input type="submit" name="update" value="Update Account"/></td>
</tr>     
</table>  
</form>    
</div>    
    
    
</body>
    
</html>

<?php
if(isset($_POST['update'])){
    $ip = getIp();
    
    $customer_id = $c_id;
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_address = $_POST['c_address'];
    $c_contact = $_POST['c_contact'];

    move_uploaded_file($c_img_tmp,"customer_images/$c_image");
    
    $update_c = "update customers set customer_name='$c_name',customer_email='$c_email',customer_pass='$c_pass',customer_address='$c_address',customer_contact='$c_contact',customer_image='$c_image' where customer_id='$customer_id'";

    $run_update = mysqli_query($con,$update_c);

    if($run_update){
        echo "<script>alert('Your Account Successfully Updated')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
    }
    }
?>    

