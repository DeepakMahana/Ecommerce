<!doctype html>

<?php
session_start();

include("admin_area/includes/db.php");
include("C:/wamp/www/BookBerry/functions/functions.php");
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

</style>    

<body>    
    
<header>
  
<a href="index.php"><img src="images/BookBerry_logo_trasp.png" align=left width="300px" height="60px" alt="Home"></a>
<a href="http://www.rait.ac.in"><img id="dylogo" src="images/dy.png" align=right width="180px" height="60px" alt="College logo"></a>   
   
    
<form id="searchbox" action="results.php" enctype="multipart/form-data">
    <input id="search" type="text" placeholder="Enter Book Name or Author Name">
    <input id="submit" type="submit" value="Search">
</form>      
    
</header>
&nbsp;<br>    
        

<ul>
<li class="dropdowm">
<a href="index.php" class="dropbtn"><h2 align="center" width="50px" height="50px"><strong>HOME</strong></h2></a>
</li>
    
    
  <li class="dropdown">
      <a class="dropbtn"><h2 align="center" width="50px" height="50px"><strong>CATEGORIES</strong></h2></a>
    <div class="dropdown-content">
      <?php getCats(); ?>
    </div>
  </li>
    
     <li class="dropdown">
    <a href="Read_Books.php" class="dropbtn"><h2 align="center" width="50px" height="50px"><strong>E-BOOKS</strong></h2></a>
  </li>    
    
    <li class="dropdown">
    <a href="Exam.php" class="dropbtn"><h2 align="center" width="50px" height="50px"><strong>EXAMS</strong></h2></a>
    </li>
    
    <li class="dropdown">
      <a href="customer/my_account.php" class="dropbtn"><h2 align="center" width="50px" height="50px"><strong>MY ACCOUNT</strong></h2></a>
    <div class="dropdown-content">
    </div>
  </li>
    
    <li class="dropdown">
    <a href="customer_register.php" class="dropbtn"><h2 align="center" width="50px" height="50px"><strong>REGISTER</strong></h2></a>
    </li>       
 </ul> 

    
<?php cart(); ?>  
<div id="shopping_cart">
<span style="float:right; font-size:22px; padding:1px; line-height:50px;">
<?php
if(isset($_SESSION['customer_email'])){
echo "<b>Welcome: </b>" . $_SESSION['customer_email'] . "&nbsp;";
}
    else{
        echo "<b> Welcome Guest : </b>";
    }
?>    
Total Items: <?php total_items() ?> -- Total Price : Rs. <?php total_price() ?>
<a href="index.php"><img src="images/shopping-cart-md.png" height="40px" width="50px"></a>
    
<?php
if(!isset($_SESSION['customer_email'])){
    
    echo "<a href='checkout.php' style='text-decoration:none; color:Red;'><b>Login</b></a>";
}  
    else {
        echo"<a href='logout.php' style='text-decoration:none; color:Green;'><b>Logout</b></a>";
    }
?> 
</span></div>     
    
<div id="cart_products">
<form action="" method="post" enctype="multipart/form-data">
<table align="center" width="100%" bgcolor="skyblue">  

<tr align="center">
<th>Remove</th>
<th>Products</th>
<th>Quantity</th>
<th>Total Price</th>    
</tr>

<?php
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
            $product_title = $pp_price['product_title'];
            $product_image = $pp_price['product_image'];
            $single_price = $pp_price['product_price'];
            $values = array_sum($product_price);
            $total += $values;  
?> 
    
<tr align="center">
<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"/></td>
<td> <?php echo $product_title; ?> <br>
    <img src="admin_area/product_images/<?php echo $product_image; ?>" width="120px" height="160px" /> </td>
<td> <input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty']; ?>" /> </td>
<?php
if(isset($_POST['update_cart'])){
    $qty = $_POST['qty'];
    $update_qty = "UPDATE cart set qty='$qty'";
    $run_qty = mysqli_query($con, $update_qty);
    $_SESSION['qty']=$qty;
    $total = $total * $qty;
}            
?>    
<td><?php echo "Rs." . $single_price; ?></td>    
<?php }} ?> 
</tr>  

<tr align="right">
<td colspan="3"><b>Sub Total :</b></td>  
<td><b><?php echo "Rs." . $total; ?></b></td>    
</tr>
    
<tr align="center">
<td colspan="3"><input type="submit" name="update_cart" value="Update Cart" /></td>
<td><input type="submit" name="continue" value="Continue Shopping" /></td>
    <td><button><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a></button></td>    
</tr>       
</table>    
</form>

<?php
function updatecart(){  
global $con;    
$ip = getIp();
if(isset($_POST['update_cart'])){
    foreach($_POST['remove'] as $remove_id){
       $delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
       $run_delete = mysqli_query($con, $delete_product);
    if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
    }    
    }
}
if(isset($_POST['continue'])){
    echo "<script>window.open('index.php','_self')</script>";
}
}
echo @$up_cart = updatecart();    
?>    
    
    
</div> 
    
<hr>
    
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
  position: inherit;
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