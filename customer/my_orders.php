<style>

    #table{
        margin-left: 40px;
    }
</style>

<h1 align="center">Your Order Details</h1><br>

<div id="table">
<table width="1000" align="center" bgcolor="pink"> 	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Product</th>
		<th>Quantity</th>
		<th>Invoice No</th>
		<th>Order Date</th>
		<th>Status</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_order = "select * from orders";
	
	$run_order = mysqli_query($con, $get_order); 
	
	$i = 0;
	
	while ($row_order=mysqli_fetch_array($run_order)){
		
		$order_id = $row_order['order_id'];
		$qty = $row_order['qty'];
		$pro_id = $row_order['p_id'];
		$invoice_no = $row_order['invoice_no'];
		$order_date = $row_order['order_date'];
		$status = $row_order['status'];
		$i++;
		
		$get_pro = "select * from products where product_id='$pro_id'";
		$run_pro = mysqli_query($con, $get_pro); 
		
		$row_pro=mysqli_fetch_array($run_pro); 
		
		$pro_image = $row_pro['product_image']; 
		$pro_title = $row_pro['product_title'];
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td>
		<?php echo "<b> $pro_title </b>" ?><br>
		<img src="../admin_area/product_images/<?php echo $pro_image;?>" width="100" height="100" />
		</td>
		<td><?php echo $qty;?></td>
		<td><?php echo $invoice_no;?></td>
		<td><?php echo $order_date;?></td>
		<td><?php echo $status;?></td>
	
	</tr>
	<?php } ?>
</table>
    
</div>    