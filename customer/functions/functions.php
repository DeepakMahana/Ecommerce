<?php

$con = mysqli_connect('localhost','root','','bookberry'); 

if (mysqli_connect_errno())
{
    echo "The Connection was Not Established to MySQL : " . mysqli_connect_error();
}

//getting user IP Address

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

//Creating the Shopping Cart

function cart(){
    if(isset($_GET['add_cart'])){
        global $con;
        $ip = getIp();
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

//Getting the Total Added Items

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

// Getting the Total Price Of The Products

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

// getting the categories

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

function getPro(){ 
    if(!isset($_GET['cat'])){
    
    global $con;
    $get_pro = "SELECT * FROM products ORDER by RAND() LIMIT 0,100";
        
    $run_pro = mysqli_query($con, $get_pro);
    
    while($row_pro=mysqli_fetch_array($run_pro)){
        
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_author = $row_pro['product_author'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_image = $row_pro['product_image'];
        
        echo "
         <li>
        <h5><b> $pro_title </b><h5>
        <img src='admin_area/product_images/$pro_image' width='170' height='210' /></a>
        <p><b> Rs. $pro_price </b></p>
        <a href='details.php?pro_id=$pro_id' style='float:left;' target='_parent';>Details</a>
        <a href='index.php?add_cart=$pro_id' target='_parent';><button style='float:right'>ADD TO CART</button></a>
        </li>
        ";
        }
    }
}

function getCatPro(){ 
    if(isset($_GET['cat'])){
    $cat_id = $_GET['cat'];
    global $con;
    $get_cat_pro = "SELECT * FROM products WHERE product_cat='$cat_id'";
        
    $run_cat_pro = mysqli_query($con, $get_cat_pro);
    
    $count_cats = mysqli_num_rows($run_cat_pro);
        
    if($count_cats==0){
        
        echo "<h2 style='padding:20px;'> No Products Were Found In this Category </h2>";
    }
        
    while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
        
        $pro_id = $row_cat_pro['product_id'];
        $pro_cat = $row_cat_pro['product_cat'];
        $pro_author = $row_cat_pro['product_author'];
        $pro_title = $row_cat_pro['product_title'];
        $pro_price = $row_cat_pro['product_price'];
        $pro_image = $row_cat_pro['product_image'];
        
        echo "
         <li>
        <h5><b> $pro_title </b><h5>
        <img src='admin_area/product_images/$pro_image' width='170' height='210' /></a>
        <p><b> Rs. $pro_price </b></p>
        <a href='details.php?pro_id=$pro_id' style='float:left;' target='_parent';>Details</a>
        <a href='index.php?add_cart=$pro_id' target='_parent';><button style='float:right'>ADD TO CART</button></a>
        </li>
        ";
       
        }
    }
}
?>
