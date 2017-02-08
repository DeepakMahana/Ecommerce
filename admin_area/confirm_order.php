<?php
include("includes/db.php");

if(isset($_GET['confirm_order'])){
    $order_id = $_GET['confirm_order'];
    $new_status = 'Completed';
    $update_status = "update orders set status='$new_status' where order_id='$order_id'";
    
    $run_update = mysqli_query($con, $update_status);
    
    if($run_update){
        echo "<script>alert('Order Has Been Confirmed Successfully !')</script>";
        echo "<script>window.open('index.php?view_orders','_self')</script>";
    }
}

?>