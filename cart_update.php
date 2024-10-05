<?php
    session_start();
    include("connection.php");
    $user = $_SESSION["email_login"];
    if(isset($_POST["submit_update"])){
        $id123 =$_POST["update_quantity_id"];
        $quant=$_POST["quant"];
        $sql="update cart set quantity='$quant' WHERE id='$id123'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "<script>alert('Quantity Successfully Updated')</script>";
            header('location:cart.php');
        };
    }
?>

<?php

if(isset($_GET['remove'])){
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "delete from cart where id = '$remove_id'");
  header('location:cart.php');
};

?>

<?php

if(isset($_GET['checkout'])){
                $checkout = $_GET['checkout'];
                $Size = $_GET['size_id'];
                $Quantity = $_GET['quantity_id'];
                $flag=0;
                while($flag==0){
                    $num= rand(1,1000);
                    $sql_product1= "select * from customer_orders where bill_id=$num";
                    $result_product1=mysqli_query($conn,$sql_product1);
                    $row_no_product1=mysqli_num_rows($result_product1);
                    if($row_no_product1 > 0){
                        $flag=0;
                    }
                    else{
                        $flag=1;
                    }
                }
                $sql_product= "select * from cart where user_id='$checkout'";
                $result_product=mysqli_query($conn,$sql_product);
                $row_no_product=mysqli_num_rows($result_product);
                if($row_no_product > 0){
                  while($new_row_product=mysqli_fetch_assoc($result_product)){
                      $id = $new_row_product["id"];
                      $product_id = $new_row_product["product_id"];
                      $product_name = $new_row_product["product_name"];
                      $product_price = $new_row_product["product_price"];
                      $product_description = $new_row_product["product_description"];
                      $product_category = $new_row_product["product_category"];
                      $company_name = $new_row_product["company_name"];
                      $product_image = $new_row_product["product_image"];
                      $product_varient_id = $new_row_product["product_varient_id"];
                      $date = date('Y-m-d');
                      $sql="insert into customer_orders (user_id, product_id, product_name, product_price, size, quantity, product_description, product_category, company_name, product_varient_id, product_image, bill_id, bill_date) values ('$checkout','$product_id','$product_name','$product_price', '$Size', '$Quantity', '$product_description', '$product_category', '$company_name', '$product_varient_id', '$product_image', '$num', '$date')";
                      $result=mysqli_query($conn,$sql);
                      if($result){
                            echo "<script>alert('Successfully Ordered Your Product')</script>";
                            header('location:payment.php');
                        }
                        else{
                            echo "SQL Error: " . mysqli_error($conn);
                        }
                      mysqli_query($conn, "delete from cart where id = '$id'");
                  }
                }
  
                if($result){
                    echo "<script>alert('Successfully Ordered Your Product')</script>";
                    header('location:payment.php');
                }
                else{
                    echo "SQL Error: " . mysqli_error($conn);
                }
  
};

?>