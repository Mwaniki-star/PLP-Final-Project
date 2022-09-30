<?php 
//CHeck whether submit button is clicked or not
if(isset($_POST['submit']))
{
    // Get all the details from the form

    $food = $_POST['food'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $total = $price * $qty; // total = price x qty 

    $order_date = date("Y-m-d h:i:sa"); //Order DAte

    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

    $customer_name = $_POST['full-name'];
    $customer_contact = $_POST['contact'];
    $customer_email = $_POST['email'];
    $customer_address = $_POST['address'];


    //Save the Order in Databaase
    //Create SQL to save the data
    $sql2 = "INSERT INTO tbl_order SET 
        food = '$food',
        price = $price,
        qty = $qty,
        total = $total,
        order_date = '$order_date',
        status = '$status',
        customer_name = '$customer_name',
        customer_contact = '$customer_contact',
        customer_email = '$customer_email',
        customer_address = '$customer_address'
    ";

    //echo $sql2; die();

    //Execute the Query
    $res2 = mysqli_query($conn, $sql2);

    //Check whether query executed successfully or not
    if($res2==true)
    {
        //Query Executed and Order Saved
        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
        header('location:'.SITEURL);
    }
    else
    {
        //Failed to Save Order
        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
        header('location:'.SITEURL);
    }

}


?>