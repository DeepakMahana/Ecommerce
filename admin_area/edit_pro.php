<!doctype html>

<?php
include("includes/db.php");

if(isset($_GET['edit_pro'])){
    $get_id = $_GET['edit_pro'];
    $get_pro = "select * from products where product_id='$get_id'";
    $run_pro = mysqli_query($con,$get_pro);
    $row_pro = mysqli_fetch_array($run_pro);

    $pro_id = $row_pro['product_id'];
    $pro_title = $row_pro['product_title'];
    $pro_image = $row_pro['product_image'];
    $pro_price = $row_pro['product_price'];
    $pro_desc = $row_pro['product_desc'];
    $pro_keywords = $row_pro['product_keywords'];
    $pro_cat    =   $row_pro['product_cat'];
    $pro_author =   $row_pro['product_author'];
    
    $get_cat = "select * from categories where cat_id='$pro_cat'";
    $run_cat=mysqli_query($con,$get_cat);
    $row_cat=mysqli_fetch_array($run_cat);
    $category_title = $row_cat['cat_title'];

}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Inserting Product</title>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script> 
</head>

   
    
<body bgcolor="skyblue">
<form action="" method="post" enctype="multipart/form-data">
<table align="center" width="800" border="2" bgcolor="#6699CC" height="495">
    
<tr align="center">
<td colspan="7"><h2>Edit & Update Your Product</h2></td>    
</tr>   
    
<tr>
    <td align="left"><b>Product Title :</b></td>
    <td><input type="text" name="product_title" size="60" required value="<?php echo $pro_title; ?>"/></td>
</tr> 

<tr>
    <td align="left"><b>Product Category :</b></td>
    <td><select name="product_cat" required>
        <option>
        <?php echo $category_title; ?>
        </option>
        <?php
        $get_cats = "SELECT * FROM categories";
        $run_cats = mysqli_query($con,$get_cats);
        while($row_cats=mysqli_fetch_array($run_cats)){
        $cat_id    =   $row_cats['cat_id'];
        $cat_title =   $row_cats['cat_title'];
        echo "<option value='$cat_id'>$cat_title</option>";
    }
 ?>
</select>
</td>
</tr> 
    
<tr>
    <td align="left"><b>Product Author / Publication :</b></td>
<td><input type="text" name="product_author" required value="<?php echo $pro_author; ?>"/></td>
</tr>
       
<tr>
    <td align="left"><b>Product Image :</b></td>
    <td><input type="file" name="product_image" /><img src="product_images/<?php echo $pro_image; ?>" width="70" height="100"/></td>
</tr>  
    
<tr>
    <td align="left"><b>Product Price :</b></td>
    <td><input type="text" name="product_price" required value="<?php echo $pro_price; ?>"/></td>
</tr>     
    
<tr>
    <td align="left"><b>Product Description :</b></td>
    <td><textarea name="product_desc" cols="35" rows="8"><?php echo $pro_desc; ?></textarea></td>
</tr>
    
<tr>
    <td align="left"><b>Product Keywords : </b></td>
<td><input type="text" name="product_keywords" size="60" required value="<?php echo $pro_keywords; ?>"/></td>
</tr>     
    
<tr align="center">
<td colspan="7"><input type="submit" name="update_product" value="Update Product"/></td>
</tr>     
    
        
</table>    
</form>
</body>
</html>

<?php

if(isset ($_POST['update_product'])){
    
    //Getting the text data from the table
    
    $update_id = $pro_id;
    
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_author = $_POST['product_author'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    
    //Getting the Image of the Product
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];
    
    move_uploaded_file($product_image_tmp,"product_images/$product_image");
    
    $update_product ="update products set product_cat='$product_cat',product_author='$product_author',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where product_id='$update_id'";
    
    $run_product = mysqli_query($con,$update_product);
    
    if($run_product){
        echo "<script> alert('Product Has Been Updated Successfully')</script>";
        echo "<script> window.open('index.php?view_products','_self')</script";
        
    }
    
}


?>




