<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include('admin_area\includes\db.php');   
?>    

<style>
html,body{
    min-height: 768px;
    min-width: 1346px;
    overflow:hidden;
}

html{
    width:100%;
    height:100%;
}    
</style>
    
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Amazon style image and title scroller</title>
<link href="scroller/amazon_scroller.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="scroller/amazon_scroller.js"></script>
</head>
    <body>
        <script language="javascript" type="text/javascript">
            $(function() {
                $("#amazon_scroller1").amazon_scroller({
                    scroller_title_show: 'enable',
                    scroller_time_interval: '5000',
                    scroller_window_background_color: "#CCC",
                    scroller_window_padding: '10',
                    scroller_border_size: '1',
                    scroller_border_color: '#000',
                    scroller_images_width: '165',
                    scroller_images_height: '190',
                    scroller_title_size: '13',
                    scroller_title_color: 'black',
                    scroller_show_count: '7',
                    directory: 'BookBerry/admin_area/product_images'
                });
            });
        </script>

        <div id="amazon_scroller1" class="amazon_scroller">
            <div class="amazon_scroller_mask">
                <ul>

    <?php
    function getPro(){    
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
        <p><b> Price : Rs. $pro_price </b></p>
        <a href='details.php?pro_id=$pro_id' style='float:left;' target='_parent';>Details</a>
        <a href='index.php?add_cart=$pro_id' target='_parent';><button style='float:right'>ADD TO CART</button></a>
        </li>
        ";
        }
    }
    ?>
    <li><?php getPro() ?> </li>     
                </ul>
            </div>
            <ul class="amazon_scroller_nav">
                <li></li>
                <li></li>
            </ul>
            <div style="clear: both"></div>
        </div>
    </body>
</html>
