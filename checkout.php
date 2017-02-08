<!doctype html>

<?php
session_start();

include("admin_area/includes/db.php");

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
      <?php getCats1(); ?>
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

    
<?php cart1(); ?>  
<div id="shopping_cart">
<span style="float:right; font-size:22px; padding:1px; line-height:50px;">
    <?php
if(isset($_SESSION['customer_email'])){
    echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "&nbsp;";
}
    else
    {
        echo"<b>Welcome Guest:</b>";
    }
    ?>
    Total Items: <?php total_items1() ?> -- Total Price : Rs. <?php total_price1() ?>
<a href="cart.php"><img src="images/shopping-cart-md.png" height="40px" width="50px"></a>
</span></div>  
    
<?php
if(!isset($_SESSION['customer_email'])){
    include("customer_login.php");
}    
  else {
      include("payment.php");
  }  
    
    
?>    
    

<br>   
<br>    
    

    
</body>
    
</html>

<?php
function total_items1(){
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
        $ip = getIp1();
        $get_items = "select * from cart where ip_add='$ip'";
        $run_items = mysqli_query($con,$get_items);
        $count_items = mysqli_num_rows($run_items);
        }
    echo $count_items;
}

function getIp1() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

function total_price1(){
    $total = 0;
    global $con;
    $ip = getIp1();
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

function getCats1(){
    global $con;
    $get_cats = "SELECT * FROM categories";
    $run_cats = mysqli_query($con,$get_cats);
    while($row_cats=mysqli_fetch_array($run_cats)){
        $cat_id    =   $row_cats['cat_id'];
        $cat_title =   $row_cats['cat_title'];
        echo "<a href='detailscat.php?cat=$cat_id'><div>$cat_title</div></a>";
    }
    
} 

function cart1(){
    if(isset($_GET['add_cart'])){
        global $con;
        $ip = getIp1();
        $pro_id = $_GET['add_cart'];
        $check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
        $run_check = mysqli_query($con, $check_pro);
        if(mysqli_num_rows($run_check)>0){
            echo"";
        }
        else{
            $insert_pro = "INSERT INTO cart (p_id,ip_add) values ('$pro_id','$ip')";
            $run_pro = mysqli_query($con, $insert_pro);
            echo"<a href='index.php' target='_parent';>";
        }
    }
}
?>