<?php

function getCatPro(){ 
    
    $i=0;
    
    if(isset($_GET['cat']))  {
        
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
        $i++;
        
echo "
        
<table width='795' align='center' bgcolor='pink'>
<tr align='center'>
<td colspan='6'><h2>View All Products Here</h2></td>    
</tr>
    
<tr align='center' bgcolor='skyblue'>
<th>S.No</th>
<th>Title</th>
<th>Image</th>
<th>Price</th>
<th>Details</th>
</tr>
        
<tr align='center'>
<td><?php echo $i; ?></td>
<td><?php echo $pro_title ; ?></td>
<td><img src='product_images/<?php echo $pro_image ;?>' width='60' height='60' /></td>
<td><?php echo 'Rs.' . $pro_price ; ?></td>
<td><a href='details.php?pro_id=$pro_id' style='float:left;' target='_parent';>Details</a></td>
</tr>

</table>    
        ";
        
    }
    }
}
?>
       