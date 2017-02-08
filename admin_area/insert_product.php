<!doctype html>

<?php

include("includes/db.php");
    
if(!isset($_SESSION['user_email'])){
    echo "<script>window.open('login.php?not_admin=You Are Not an Admin !','_self')</script>";
}

else {


?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Inserting Product</title>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script> 
</head>

   
    
<body bgcolor="skyblue">
<form action="insert_product.php" method="post" enctype="multipart/form-data">
<table align="center" width="800" border="2" bgcolor="#6699CC" height="495">
    
<tr align="center">
<td colspan="7"><h2>Insert New Product Here</h2></td>    
</tr>   
    
<tr>
    <td align="left"><b>Product Title :</b></td>
    <td><input type="text" name="product_title" size="60" required/></td>
</tr> 

<tr>
    <td align="left"><b>Product Category :</b></td>
    <td><select name="product_cat" required>
        <option>
        Select a Category
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
<td><input type="text" name="product_author" required/></td>
</tr>
       
<tr>
    <td align="left"><b>Product Image :</b></td>
    <td><input type="file" name="product_image" required/></td>
</tr>  
    
<tr>
    <td align="left"><b>Product Price :</b></td>
    <td><input type="text" name="product_price" required/></td>
</tr>     
    
<tr>
    <td align="left"><b>Product Description :</b></td>
    <td><textarea name="product_desc" cols="35" rows="8"></textarea></td>
</tr>
    
<tr>
    <td align="left"><b>Product Keywords : </b></td>
<td><input type="text" name="product_keywords" size="60" required/></td>
</tr>     
    
<tr align="center">
<td colspan="7"><input type="submit" name="insert_post" value="Insert Product"/></td>
</tr>     
    
        
</table>    
</form>
</body>
</html>

<?php

if(isset ($_POST['insert_post'])){
    
    //Getting the text data from the table
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
    
    $insert_product ="INSERT into products (product_cat,product_author,product_title,product_price,product_desc,product_image,product_keywords) values ('$product_cat','$product_author','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
    
    $insert_pro = mysqli_query($con,$insert_product);
    
    if($insert_pro){
        echo "<script> alert('Product Has Been Added Successfully')</script>";
        echo "<script> window.open('index.php?insert_product','_self')</script";
        
    }
    
}


?>

<?php
}
?>



