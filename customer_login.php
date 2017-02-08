
<!doctype html>

<?php

include("includes/db.php");
?>

<html>   
    
<head>
    <meta charset="UTF-8">
    <title>BookBerry || Buy And Sell Books Online</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
  </head>
    
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 0.1px 20px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 300px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 20px 20px;
    text-decoration: none;
    display: block;
    text-align: center;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
    
#searchbox
{
    background-color: #eaf8fc;
    background-image: linear-gradient(#fff, #d4e8ec);
    border-radius: 35px;    
    border-width: 1px;
    border-style: solid;
    border-color: #c4d9df #a4c3ca #83afb7;            
    width: 500px;
    height: 35px;
    padding: 5px;
    margin: 15px 400px auto;
    overflow: hidden; /* Clear floats */
}  
    
#search, 
#submit {
    float: left;
}

#search {
    padding: 5px 9px;
    height: 23px;
    width: 380px;
    border: 1px solid #a4c3ca;
    font: normal 13px 'trebuchet MS', arial, helvetica;
    background: #f1f1f1;
    border-radius: 50px 3px 3px 50px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25) inset, 0 1px 0 rgba(255, 255, 255, 1);            
}

/* ----------------------- */

#submit
{       
    background-color: #6cbb6b;
    background-image: linear-gradient(#95d788, #6cbb6b);
    border-radius: 3px 50px 50px 3px;    
    border-width: 1px;
    border-style: solid;
    border-color: #7eba7c #578e57 #447d43;
    box-shadow: 0 0 1px rgba(0, 0, 0, 0.3), 
                0 1px 0 rgba(255, 255, 255, 0.3) inset;
    height: 35px;
    margin: 0 0 0 10px;
    padding: 0;
    width: 90px;
    cursor: pointer;
    font: bold 14px Arial, Helvetica;
    color: #23441e;    
    text-shadow: 0 1px 0 rgba(255,255,255,0.5);
}

#submit:hover {       
    background-color: #95d788;
    background-image: linear-gradient(#6cbb6b, #95d788);
}   

#submit:active {       
    background: #95d788;
    outline: none;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;        
}

#submit::-moz-focus-inner {
       border: 0;  /* Small centering fix for Firefox */
}

#search::-webkit-input-placeholder {
   color: #9c9c9c;
   font-style: italic;
}

#search:-moz-placeholder {
   color: #9c9c9c;
   font-style: italic;
}  

#search:-ms-placeholder {
   color: #9c9c9c;
   font-style: italic;
} 
    
    
#cart
{           
    width: 50px;
    height: 40px;
    padding: 1px;
    margin: 5px 60px 0px;
    overflow: hidden; /* Clear floats */
}  
    
#shopping_cart{
        width: 100%;
        height: 50px;
        background: white;
        float:inherit;
    }
    
    #table{
        margin-left: 430px;
        margin-top: 20px;
    }    
    



</style>    
    
<body>    
    

<div id="table">
<form method="post" action="">
<table width=500 align="center" bgcolor="skyblue" cellspacing="20">

<tr align="center">
    <td colspan="4"><h2>Login or Register to Buy !</h2><br></td>    
</tr> 
    
<tr align="center">
    <td colspan="5"><img src="images/login.png" width="100" height="100"><br></td>    
</tr>     
    
<tr>
    <td><h4>Email : </h4></td>
<td><input type="text" name="email" placeholder="Enter Email" required/></td>    
</tr>  
    
<tr>
    <td><h4>Password : </h4></td>
<td><input type="password" name="pass" placeholder="Enter Password" required/></td>    
</tr>

<tr align="center">
<td colspan="4"><a href="forgot_pass/index.php">Forgot Password</a></td>
</tr>    

    
<tr align="center">
<td colspan="5"><input type="submit" name="login" placeholder="Login" /></td>    
</tr>       
    
</table>  
<h2 style="float:left; padding:20px;"><a href="customer_register.php" style="text-decoration:none;">New to BookBerry ? Register Now.</a></h2>    
    
</form>
</div>

<?php
if(isset($_POST['login'])){
    $c_email = $_POST['email'];
    $c_pass = $_POST['pass'];
    
    $sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
    $run_c = mysqli_query($con, $sel_c);
    $check_customer = mysqli_num_rows($run_c);
    
    if($check_customer==0){
        echo "<script>alert('Password or Email is Incorrect, Please Try Again !')</script>";
        exit();
    }
    $ip = getIp();
    $sel_cart = "select * from cart where ip_add='$ip'";
    $run_cart = mysqli_query($con, $sel_cart);
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_customer>0 AND $check_cart==0){
        
        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('You Logged In Successfully, Thanks !')</script>";
        echo "<script>window.open('customer/my_account.php','_self')</script>";
    }
    else {
        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('You Logged In Successfully, Thanks !')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
        }
     }


?> 

<br>
<br>    
    
    
<style>

#footer {
  height: 30px;
  width: 100%;    
  background-color: greenyellow; 
  padding-top: 5px;
  padding-bottom: 5px;    
  font-family: arial;
  text-decoration: none;
  word-spacing: 5px; 
  font-size: 20px;
  position: absolute;
  bottom: 0;
  margin: 0 auto;    
}
 
</style>    
   
<div id="footer">
    &nbsp;&nbsp;&nbsp;    
    <a href="aboutus.php">About Us</a> | 
    <a href="termscond.php">Terms And Conditions</a> | 
    <a href="contactus.php">Contact Us</a> | 
        &nbsp;&nbsp;<span><font color=Black> &nbsp; Copyright @ BookBerry Pvt Ltd 2016-2020 </font> </span> &nbsp; &nbsp;|| &nbsp;&nbsp;
    <a href="www.facebook.com"><img src="images/Facebook.png" width="30" height="22"></a> &nbsp; | &nbsp; 
    <a href="www.twitter.com"><img src="images/twitter.jpg" width="30" height="22"></a>
  </div>    
    
        
</body>
    
</html>  

<?php
function total_items(){
    if(isset($_GET['add_cart'])){
        global $con;
        $ip = getIp();
        $get_items = "select * from cart where ip_add='$ip'";
        $run_items = mysqli_query($con,$get_items);
        $count_items = mysqli_num_rows($run_items);
    }
        else
        {
        global $con;
        $ip = getIp();
        $get_items = "select * from cart where ip_add='$ip'";
        $run_items = mysqli_query($con,$get_items);
        $count_items = mysqli_num_rows($run_items);
        }
    echo $count_items;
}

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

function total_price(){
    $total = 0;
    global $con;
    $ip = getIp();
    $sel_price = "select * from cart where ip_add='$ip'";
    $run_price = mysqli_query($con,$sel_price);
    while($p_price=mysqli_fetch_array($run_price)){
        $pro_id = $p_price['p_id'];
        $pro_price = "select * from products where product_id='$pro_id'";
        $run_pro_price = mysqli_query($con,$pro_price);
        while ($pp_price = mysqli_fetch_array($run_pro_price)){
            $product_price = array($pp_price['product_price']);
            $values = array_sum($product_price);
            $total += $values;
        }
    }
    echo $total;
}

function getCats(){
    global $con;
    $get_cats = "SELECT * FROM categories";
    $run_cats = mysqli_query($con,$get_cats);
    while($row_cats=mysqli_fetch_array($run_cats)){
        $cat_id    =   $row_cats['cat_id'];
        $cat_title =   $row_cats['cat_title'];
        echo "<a href='detailscat.php?cat=$cat_id'><div>$cat_title</div></a>";
    }
    
} 
?>
    
    
    
    
    
